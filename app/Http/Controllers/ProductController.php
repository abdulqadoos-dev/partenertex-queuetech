<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    protected $categories = [
        ["label" => "Chair", "value" => "chair"],
        ["label" => "Sofa", "value" => "sofa"],
        ["label" => "Dressing", "value" => "dressing"],
        ["label" => "Drawer", "value" => "drawer"],
        ["label" => "Bed", "value" => "bed"],
    ];

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return view('pages.products.index', ["products" => $this->product->orderBy('id', 'DESC')->get()]);
    }

    public function form($id = null)
    {
        return view('pages.products.form', [
            'data' => $this->product->find($id) ?? null,
            'categories' => $this->categories,
        ]);
    }

    public function save(Request $request)
    {
        $this->product->updateOrCreate(['id' => $request->id], $request->all());
        return redirect()->route('products')->with(['message' => 'Product saved successfully']);
    }
}
