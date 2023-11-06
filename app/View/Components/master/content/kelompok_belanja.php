<?php

namespace App\View\Components\master\content;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class kelompok_belanja extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.master.content.kelompok_belanja');
    }
}
