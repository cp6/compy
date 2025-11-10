<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

final class EmailPreviewController extends Controller
{
    /**
     * Display the email preview index page.
     */
    public function index(): View
    {
        return view('emails.preview.index');
    }

    /**
     * Preview the email verification template.
     */
    public function verifyEmail(): View
    {
        // Generate a mock verification URL
        $url = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => 1,
                'hash' => sha1('example@example.com'),
            ]
        );

        return view('emails.verify-email', [
            'url' => $url,
            'count' => Config::get('auth.verification.expire', 60),
        ]);
    }

    /**
     * Preview the password reset template.
     */
    public function resetPassword(): View
    {
        // Generate a mock reset URL
        $url = url(route('password.reset', [
            'token' => 'example-token-here',
            'email' => 'example@example.com',
        ], false));

        return view('emails.reset-password', [
            'url' => $url,
            'count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire', 60),
        ]);
    }
}

