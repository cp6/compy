<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    /**
     * Whether to show the page spinner loader.
     */
    public bool $spinner;

    /**
     * Spinner display duration in milliseconds.
     */
    public int $spinnerTime;

    /**
     * Spinner variant (default, gradient, pulse).
     */
    public string $spinnerVariant;

    /**
     * Spinner size (sm, md, lg, xl).
     */
    public string $spinnerSize;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $spinner = false,
        int $spinnerTime = 1000,
        string $spinnerVariant = 'gradient',
        string $spinnerSize = 'xl'
    ) {
        $this->spinner = $spinner;
        $this->spinnerTime = $spinnerTime;
        $this->spinnerVariant = $spinnerVariant;
        $this->spinnerSize = $spinnerSize;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app', [
            'showSidebar' => Auth::check(),
        ]);
    }
}
