<?php

namespace App\View\Components\Base\Front\Partial;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterSidebar3 extends Component
{
    public $pages;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->pages = Page::orderBy("title","asc")->get();
        //dd($this->pages);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.front.partial.footer-sidebar3');
    }
}
