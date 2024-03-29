<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\BundleProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    protected $bundle, $bundleProduct;

    public function __construct()
    {
        $this->bundle = new Bundle;
        $this->bundleProduct = new BundleProduct;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.bundles.index', ["bundles" => $this->bundle->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        return view('pages.bundles.form', [
            'data' => $this->bundle->find($id) ?? null,
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bundle = $this->bundle->updateOrCreate(['id' => $request->id], $request->all());
        foreach ($request->product_id as $index => $pIds){
            $this->bundleProduct->updateOrCreate(['bundle_id' => $bundle->id, 'product_id' => $pIds], ['quantity' => ($request->quantity[$index] ?? 0)]);
        }
        return redirect()->route('bundles')->with(['message' => 'Bundles saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bundle->find($id)->delete();
        return redirect()->route('bundles')->with(['message' => 'Bundle delete successfully']);
    }
}
