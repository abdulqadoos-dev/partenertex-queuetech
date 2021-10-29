<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected $order;

    protected $delivery_options = [
        ["label" => "Pickup", "value" => "pickup"],
        ["label" => "Curbside Delivery", "value" => "curbside_delivery"],
        ["label" => "WhiteGlove Delivery", "value" => "whiteGlove_delivery"]
    ];

    protected $status_options = [
        ["label" => "Fulfilled", "value" => "fulfilled"],
        ["label" => "Partially Fulfilled", "value" => "partially_fulfilled"],
        ["label" => "Open", "value" => "open"]
    ];

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        return view('pages.orders.index', ["orders" => $this->order->orderBy('id', 'DESC')->get()]);
    }

    public function form($id = null)
    {

        return view('pages.orders.form', [
            'data' => $this->order->find($id) ?? null,
            'status_options' => $this->status_options,
            'delivery_options' => $this->delivery_options,
            'customers' => Customer::all('id', 'name'),
            'employees' => Employee::all('id', 'name'),
        ]);
    }

    public function save(Request $request)
    {
        $this->order->updateOrCreate(['id' => $request->id], $request->all());
        return redirect()->route('orders')->with(['message' => 'Order saved successfully']);
    }
}
