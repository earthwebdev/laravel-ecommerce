<?php

namespace App\View\Components\Base\Front\Partial;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FooterSidebar2 extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $categories = Category::where('is_featured','1')->where('status', 'active')->inRandomOrder()->limit(5)->get();
        //
        if(count($categories) < 1){
            $categories = Category::where('status', 'active')->inRandomOrder()->limit(5)->get();
        }

        $this->categories = $categories;
        //dd($categories);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.front.partial.footer-sidebar2');
    }
}
