<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class OrderFormProductSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order-form-product-section');
    }
}
