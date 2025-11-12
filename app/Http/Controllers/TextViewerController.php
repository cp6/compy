<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

final class TextViewerController
{
    public function demo(Request $request): View
    {
        $logPath = storage_path('logs/laravel.log');
        $logContent = '';
        
        if (File::exists($logPath)) {
            $logContent = File::get($logPath);
            
            // Limit to last 1000 lines if file is too large
            $lines = explode("\n", $logContent);
            if (count($lines) > 1000) {
                $logContent = implode("\n", array_slice($lines, -1000));
            }
        }
        
        return view('text-viewer-demo', [
            'logContent' => $logContent,
        ]);
    }
}

