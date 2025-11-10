<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

final class FormDemoController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        // Randomly select a message type
        $types = ['success', 'error', 'warning', 'info'];
        $selectedType = $types[array_rand($types)];
        
        // Define messages for each type
        $messages = [
            'success' => 'Form submitted successfully! Your information has been saved.',
            'error' => 'An error occurred while submitting the form. Please try again.',
            'warning' => 'Warning: Some fields may need attention. Please review your input.',
            'info' => 'Your form has been received. We will process it shortly.',
        ];
        
        // Map 'info' to 'notice' for Laravel session flash
        $sessionKey = $selectedType === 'info' ? 'notice' : $selectedType;
        
        return redirect()
            ->route('forms.demo')
            ->with($sessionKey, $messages[$selectedType]);
    }
}

