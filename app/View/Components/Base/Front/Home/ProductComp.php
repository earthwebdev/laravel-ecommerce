<?php

namespace App\View\Components\Base\Front\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductComp extends Component
{
    public $product;
    /**
     * Create a new component instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
        //dd($this->product);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.front.home.product-comp');
    }
}
