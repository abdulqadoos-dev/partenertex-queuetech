<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                        <p class="mb-4">View the order details</p>
                    </div>
                    <div>
                        <a href="{{route('orders')}}" class="btn btn-primary">View All</a>
                        <a href="{{route('orders.form')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                @if(session('message'))
                    <x-alert class="alert-success" :message="session('message')"/> @endif
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row ">
                            <div class="col-lg-6">
                                <div class="p-3 border rounded">
                                    <h6 class="text-dark font-weight-bold">Order details</h6>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Order number </span>
                                        <span>{{$order->order_no}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Receipt date </span>
                                        <span>{{$order->receipt_date}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Cutting date </span>
                                        <span>{{$order->cutting_date}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Sewing date </span>
                                        <span>{{$order->sewing_date}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Paking date </span>
                                        <span>{{$order->packing_date}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Delivery date </span>
                                        <span>{{$order->delivery_date}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Delivery method </span>
                                        <span>{{$order->delivery_method}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Status </span>
                                        <span>{{$order->status}}</span>
                                    </div>


                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Type </span>
                                        <span>{{$order->type}}</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-3 border rounded">
                                    <h6 class="text-dark font-weight-bold">Customer details</h6>
                                    <hr>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Name </span>
                                        <span>{{$order->customer->name}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Phone </span>
                                        <span>{{$order->customer->phone}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Email </span>
                                        <span>{{$order->customer->email}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Address </span>
                                        <span>{{$order->customer->address}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">City </span>
                                        <span>{{$order->customer->city}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Country </span>
                                        <span>{{$order->customer->country}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Name </span>
                                        <span>{{$order->customer->postal_code}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="font-weight-bold">Join source </span>
                                        <span>{{$order->customer->join_source}}</span>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="p-3 border rounded mt-4">
                                    <h6 class="text-dark font-weight-bold">Ordered Products</h6>
                                    <hr>

                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">name</th>
                                            <th scope="col">category</th>
                                            <th scope="col">sales price</th>
                                            <th scope="col">buy price</th>
                                            <th scope="col">stock</th>
                                            <th scope="col">sku</th>
                                            <th scope="col">upc</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->category}}</td>
                                                <td>{{$item->unit_sale_price}}</td>
                                                <td>{{$item->unit_buy_price}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>{{$item->sku}}</td>
                                                <td>{{$item->upc}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
