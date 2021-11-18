<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\BundleOrder;
use App\Models\BundleProduct;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Inventory;
use App\Models\InventoryOrder;
use App\Models\InventoryOrderProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected $order, $bundleOrder, $orderProduct, $inventoryOrderProduct, $inventoryOrder;

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

    protected $order_type = [
        ['label' => 'Internal', 'value' => 'internal'],
        ['label' => 'External', 'value' => 'external'],
    ];

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->bundleOrder = new BundleOrder;
        $this->orderProduct = new OrderProduct;
        $this->inventoryOrderProduct = new InventoryOrderProduct;
        $this->inventoryOrder = new InventoryOrder;
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
            'products' => Product::all('id', 'name','unit_sale_price','stock'),
            'bundles' => Bundle::all('id', 'name'),
            'inventories' => Inventory::all('id', 'name'),
            'order_type' => $this->order_type,
        ]);
    }

    public function save(Request $request)
    {
        $order = $this->order->updateOrCreate(['id' => $request->id], $request->all());
        $this->saveBundles($request, $order);
        $this->saveProducts($request, $order);
        $this->inventoryOrderProducts($request, $order);
        return redirect()->route('orders')->with(['message' => 'Order saved successfully']);
    }

    public function saveBundles($request, $order)
    {
        foreach ($request->bundle_id ?? [] as $index => $bundle_id) {
            $this->bundleOrder->updateOrCreate(['bundle_id' => $bundle_id, 'order_id' => $order->id], ['quantity' => ($request->bundle_quantity[$index] ?? 1)]);
        }
    }

    public function saveProducts($request, $order)
    {
        foreach ($request->product_id ?? [] as $index => $product_id) {
            $this->orderProduct->updateOrCreate(['product_id' => $product_id, 'order_id' => $order->id], ['quantity' => ($request->product_quantity[$index] ?? 1)]);
        }
    }

    public function inventoryOrderProducts($request, $order)
    {
        if (isset($request->name)) {
            $inventoryOrderProduct = $this->inventoryOrderProduct->updateOrCreate(['order_id' => $order->id, 'name' => $request->name], $request->all());
            foreach($request->inventory_id ?? [] as $inventory_id){
                $this->inventoryOrder->updateOrCreate(['inventory_order_product_id' => $inventoryOrderProduct->id, 'inventory_id' => $inventory_id]);
            }
        }
    }
}
