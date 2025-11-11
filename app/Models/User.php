<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'uuid',
        'status',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'api_key',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_key',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'integer',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (User $user): void {
            if (empty($user->uuid)) {
                $user->uuid = (string) Str::uuid();
            }
            if (empty($user->api_key)) {
                $user->api_key = Str::random(32);
            }
        });
    }

    /**
     * Get the user's full name.
     */
    public function getNameAttribute(): string
    {
        if ($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }

        return $this->first_name ?? $this->last_name ?? $this->username ?? $this->email;
    }

    /**
     * Get the user's avatar URL.
     * Generates a unique avatar based on UUID or email without storing it in the database.
     * 
     * Available providers (set via config 'app.avatar_provider'):
     * - 'dicebear' (default): DiceBear Avatars - many styles, seed-based
     * - 'ui-avatars': UI Avatars - initials-based, simple
     * - 'gravatar': Gravatar - email-based, most popular
     * - 'boring-avatars': Boring Avatars - geometric patterns
     * - 'multiavatar': Multiavatar - diverse character avatars
     * - 'adorable': Adorable Avatars - simple cartoon avatars
     * - 'robohash': RoboHash - robot-themed avatars
     * 
     * Usage: $user->avatar or $user->getAvatar('gravatar')
     * 
     * @return string The avatar URL
     */
    public function getAvatarAttribute(): string
    {
        return $this->getAvatar();
    }
    
    /**
     * Get avatar URL with optional provider override.
     * 
     * @param string|null $provider The avatar provider to use (optional)
     * @return string The avatar URL
     */
    public function getAvatar(?string $provider = null): string
    {
        $provider = $provider ?? config('app.avatar_provider', 'dicebear');
        
        // Use UUID if available, otherwise fall back to email
        $seed = $this->uuid ?? $this->email ?? (string) $this->id;
        $emailHash = md5(strtolower(trim($this->email ?? $seed)));
        $name = $this->name;
        $initials = $this->getInitials();
        
        return match($provider) {
            'dicebear' => $this->getDiceBearAvatar($seed),
            'ui-avatars' => $this->getUIAvatarsAvatar($name, $initials),
            'gravatar' => $this->getGravatarAvatar($emailHash),
            'boring-avatars' => $this->getBoringAvatarsAvatar($seed),
            'multiavatar' => $this->getMultiavatarAvatar($seed),
            'adorable' => $this->getAdorableAvatar($seed),
            'robohash' => $this->getRoboHashAvatar($seed),
            default => $this->getDiceBearAvatar($seed),
        };
    }
    
    /**
     * Get DiceBear avatar URL.
     * Styles: avataaars, adventurer, big-smile, bottts, lorelei, micah, miniavs, open-peeps, personas, pixel-art, shapes, thumbs
     * See: https://www.dicebear.com/styles
     */
    private function getDiceBearAvatar(string $seed): string
    {
        $style = config('app.avatar_dicebear_style', 'avataaars');
        return "https://api.dicebear.com/7.x/{$style}/svg?seed={$seed}&backgroundColor=b6e3f4,c0aede,d1d4f9,ffd5dc,ffdfbf";
    }
    
    /**
     * Get UI Avatars URL (initials-based).
     * Simple, clean avatars with user initials.
     */
    private function getUIAvatarsAvatar(string $name, string $initials): string
    {
        $background = config('app.avatar_ui_background', 'random'); // random, hex color, or color name
        
        // If 'random', generate deterministic color based on name hash
        if ($background === 'random') {
            $colorPalette = [
                '264653', // Dark teal
                '2a9d8f', // Teal
                'e9c46a', // Yellow
                'f4a261', // Orange
                'e76f51', // Coral
                '92A1C6', // Blue-gray
                '146A7C', // Dark blue
                'F0AB3D', // Gold
                'C271B4', // Purple
                'C20D90', // Magenta
            ];
            
            // Use hash of name to deterministically pick a color
            $hash = crc32($name);
            $colorIndex = abs($hash) % count($colorPalette);
            $background = $colorPalette[$colorIndex];
        }
        
        return "https://ui-avatars.com/api/?name=" . urlencode($name) . "&background={$background}&size=256&bold=true&color=fff&format=svg";
    }
    
    /**
     * Get Gravatar URL (email-based).
     * Most popular avatar service. Users can upload their own at gravatar.com
     * d= parameter: identicon, monsterid, wavatar, retro, robohash, blank, 404, or image URL
     */
    private function getGravatarAvatar(string $emailHash): string
    {
        $default = config('app.avatar_gravatar_default', 'identicon'); // identicon, monsterid, wavatar, retro, robohash, blank, 404
        $size = config('app.avatar_size', 256);
        return "https://www.gravatar.com/avatar/{$emailHash}?d={$default}&s={$size}";
    }
    
    /**
     * Get Boring Avatars URL (geometric patterns).
     * Simple, colorful geometric avatar patterns.
     * Variants: marble, beam, pixel, sunset, ring, bauhaus
     */
    private function getBoringAvatarsAvatar(string $seed): string
    {
        $variant = config('app.avatar_boring_variant', 'marble'); // marble, beam, pixel, sunset, ring, bauhaus
        $size = config('app.avatar_size', 256);
        return "https://source.boringavatars.com/{$variant}/{$size}/{$seed}?colors=264653,2a9d8f,e9c46a,f4a261,e76f51";
    }
    
    /**
     * Get Multiavatar URL (diverse character avatars).
     * Generates diverse, inclusive character avatars.
     */
    private function getMultiavatarAvatar(string $seed): string
    {
        return "https://api.multiavatar.com/{$seed}.svg";
    }
    
    /**
     * Get Adorable Avatars URL (simple cartoon avatars).
     * Simple, cute cartoon-style avatars.
     */
    private function getAdorableAvatar(string $seed): string
    {
        $size = config('app.avatar_size', 256);
        return "https://api.adorable.io/avatars/{$size}/{$seed}.png";
    }
    
    /**
     * Get RoboHash URL (robot-themed avatars).
     * Generates robot-themed avatars based on seed.
     * Sets: set1, set2, set3, set4, set5, or any1-any5
     */
    private function getRoboHashAvatar(string $seed): string
    {
        $set = config('app.avatar_robohash_set', 'set1'); // set1-set5, any1-any5
        $size = config('app.avatar_size', 256);
        return "https://robohash.org/{$seed}?set={$set}&size={$size}x{$size}";
    }

    /**
     * Get the user's initials for avatar generation.
     */
    public function getInitials(): string
    {
        if ($this->first_name && $this->last_name) {
            return strtoupper(substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1));
        }
        
        if ($this->first_name) {
            return strtoupper(substr($this->first_name, 0, 2));
        }
        
        if ($this->last_name) {
            return strtoupper(substr($this->last_name, 0, 2));
        }
        
        if ($this->username) {
            return strtoupper(substr($this->username, 0, 2));
        }
        
        return strtoupper(substr($this->email, 0, 2));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token));
    }
}
