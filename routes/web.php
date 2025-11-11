<?php

use App\Http\Controllers\EmailPreviewController;
use App\Http\Controllers\FormDemoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/premium-demo', function () {
    return view('premium-demo');
})->name('premium-demo');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::get('/sample', function () {
    return view('sample');
})->name('sample');

Route::get('/usage-demo', function () {
    return view('usage-demo');
})->name('usage-demo');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/forms/demo', function () {
        return view('forms.demo');
    })->name('forms.demo');
    
    Route::post('/forms/demo', [FormDemoController::class, 'submit'])->name('forms.demo.submit');
    
    Route::get('/tables/demo', function () {
        return view('tables.demo');
    })->name('tables.demo');
    
    Route::get('/tables/dynamic', function () {
        return view('tables.dynamic-demo');
    })->name('tables.dynamic');
    
    Route::get('/lists/demo', function () {
        return view('lists.demo');
    })->name('lists.demo');
    
    Route::get('/cards/demo', function () {
        return view('cards.demo');
    })->name('cards.demo');
    
    Route::get('/cards/dynamic', function () {
        return view('cards.dynamic-demo');
    })->name('cards.dynamic');
    
    Route::get('/buttons/demo', function () {
        return view('buttons.demo');
    })->name('buttons.demo');
    
    Route::get('/files/demo', function () {
        return view('files.demo');
    })->name('files.demo');
    
    Route::get('/modals/demo', function () {
        return view('modals.demo');
    })->name('modals.demo');
    
    Route::get('/misc/demo', function () {
        return view('misc-demo');
    })->name('misc.demo');
    
    Route::get('/comments/demo', function () {
        return view('comments-demo');
    })->name('comments.demo');
    
    Route::get('/tabs/demo', function () {
        return view('tabs-demo');
    })->name('tabs.demo');
    
    Route::get('/accordion/demo', function () {
        return view('accordion-demo');
    })->name('accordion.demo');
    
    Route::get('/toast/demo', function () {
        return view('toast-demo');
    })->name('toast.demo');
    
    Route::get('/timeline/demo', function () {
        return view('timeline-demo');
    })->name('timeline.demo');
    
    Route::get('/icons/demo', function () {
        return view('icons.demo');
    })->name('icons.demo');
    
    Route::get('/grid/demo', function () {
        return view('grid.demo');
    })->name('grid.demo');
    
    Route::get('/calendar/demo', function () {
        return view('calendar-demo');
    })->name('calendar.demo');
    
    Route::get('/ai-chat/demo', function () {
        return view('ai-chat-demo');
    })->name('ai-chat.demo');
    
    Route::get('/support-ticket/demo', function () {
        return view('support-ticket-demo');
    })->name('support-ticket.demo');
    
    Route::get('/chat/demo', function () {
        return view('chat-demo');
    })->name('chat.demo');
    
    Route::get('/email/demo', function () {
        return view('email-demo');
    })->name('email.demo');
    
    Route::get('/estore/demo', function () {
        return view('estore-demo');
    })->name('estore.demo');
    
    Route::get('/charts/demo', function () {
        return view('charts-demo');
    })->name('charts.demo');
    
    Route::get('/task/create', function () {
        return view('task-create-demo');
    })->name('task.create');
    
    Route::get('/task/list', function () {
        return view('task-list-demo');
    })->name('task.list');
    
    Route::get('/profile/demo', function () {
        return view('profile-demo');
    })->name('profile.demo');
    
    Route::get('/typography/demo', function () {
        return view('typography-demo');
    })->name('typography.demo');
    
    Route::get('/api-keys/demo', function () {
        return view('api-keys.demo');
    })->name('api-keys.demo');
    
    Route::get('/video-player/demo', function () {
        return view('video-player-demo');
    })->name('video-player.demo');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Email preview routes (only in local/development)
if (app()->environment(['local', 'development'])) {
    Route::prefix('email-preview')->name('email-preview.')->group(function () {
        Route::get('/', [EmailPreviewController::class, 'index'])->name('index');
        Route::get('/verify-email', [EmailPreviewController::class, 'verifyEmail'])->name('verify-email');
        Route::get('/reset-password', [EmailPreviewController::class, 'resetPassword'])->name('reset-password');
    });
}

require __DIR__.'/auth.php';
