<?php

namespace App\View\Components\Base\Front\Home;

use Closure;
use App\Models\Slide;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SlideComp extends Component
{
    public $slides;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->slides = Slide::orderBy('title', 'asc')->where('status','active')->get();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.front.home.slide-comp');
    }
}
