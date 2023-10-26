<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $datalayout;
    public $datalogin;
    public function __construct($datalayout,$datalogin)
    {
        $this->datalayout= $datalayout;
        $this->datalogin= $datalogin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.layout');
    }
}
