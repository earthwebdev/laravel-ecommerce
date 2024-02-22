<?php

namespace App\View\Components\Base\Back\Common;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterScripts extends Component
{
    public $id = "content";
    /**
     * Create a new component instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.back.common.footer-scripts');
    }
}
