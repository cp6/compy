@props([
    'action' => '#',
    'method' => 'POST',
])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes }}>
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    
    <div class="space-y-6">
        {{-- To --}}
        <div>
            <x-form.label for="to" value="To" required />
            <x-form.input 
                id="to" 
                name="to" 
                type="email" 
                :value="old('to')" 
                required 
                placeholder="recipient@example.com"
                class="mt-1"
            />
            <x-form.error name="to" />
        </div>
        
        {{-- Subject --}}
        <div>
            <x-form.label for="subject" value="Subject" required />
            <x-form.input 
                id="subject" 
                name="subject" 
                type="text" 
                :value="old('subject')" 
                required 
                placeholder="Email subject"
                class="mt-1"
            />
            <x-form.error name="subject" />
        </div>
        
        {{-- Message --}}
        <div>
            <x-form.label for="message" value="Message" required />
            <x-form.textarea 
                id="message" 
                name="message" 
                rows="10"
                required
                placeholder="Type your message here..."
                class="mt-1"
            >{{ old('message') }}</x-form.textarea>
            <x-form.error name="message" />
        </div>
        
        {{-- Actions --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <x-button.secondary type="button">
                    Attach File
                </x-button.secondary>
            </div>
            <div class="flex items-center gap-3">
                <x-button.secondary type="button" onclick="history.back()">
                    Cancel
                </x-button.secondary>
                <x-button.primary type="submit">
                    Send
                </x-button.primary>
            </div>
        </div>
    </div>
</form>

