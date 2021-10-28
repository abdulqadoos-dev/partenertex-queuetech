<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        return view('pages.customers.index', ["customers" => $this->customer->orderBy('id', 'DESC')->get()]);
    }

    public function form($id = null)
    {
        return view('pages.customers.form', ['data' => $this->customer->find($id) ?? null]);
    }

    public function save(Request $request)
    {
        $this->customer->updateOrCreate(['id' => $request->id], $request->all());
        return redirect()->route('customers')->with(['message' => 'Customer saved successfully']);
    }

}
