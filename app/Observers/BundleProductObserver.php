<?php

namespace App\Observers;

use App\Models\BundleProduct;
use App\Models\Product;

class BundleProductObserver
{
    protected $products;

    public function __construct()
    {
        $this->products = new Product;
    }

    /**
     * Handle the BundleProduct "created" event.
     *
     * @param  \App\Models\BundleProduct  $bundleProduct
     * @return void
     */
    public function created(BundleProduct $bundleProduct)
    {
        $product = $this->products->find($bundleProduct->product_id);
        $product->stock = $product->stock - $bundleProduct->quantity;
        $product->Save();
    }

    /**
     * Handle the BundleProduct "updated" event.
     *
     * @param  \App\Models\BundleProduct  $bundleProduct
     * @return void
     */
    public function updated(BundleProduct $bundleProduct)
    {
        //
    }

    /**
     * Handle the BundleProduct "deleted" event.
     *
     * @param  \App\Models\BundleProduct  $bundleProduct
     * @return void
     */
    public function deleted(BundleProduct $bundleProduct)
    {
        //
    }

    /**
     * Handle the BundleProduct "restored" event.
     *
     * @param  \App\Models\BundleProduct  $bundleProduct
     * @return void
     */
    public function restored(BundleProduct $bundleProduct)
    {
        //
    }

    /**
     * Handle the BundleProduct "force deleted" event.
     *
     * @param  \App\Models\BundleProduct  $bundleProduct
     * @return void
     */
    public function forceDeleted(BundleProduct $bundleProduct)
    {
        //
    }
}
