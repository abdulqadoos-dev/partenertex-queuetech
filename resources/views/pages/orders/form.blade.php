<x-dashboard>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                        <p class="mb-4">Proceed to create or update order</p>
                    </div>
                    <div>
                        <a href="{{route('orders')}}" class="btn btn-primary">View all</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{route('orders.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id ?? old('id')}}">
                            <input type="hidden" name="order_no" value="{{$data['order_no'] ?? $data['order_no'] = \Str::upper(\Str::random(15))}}">

                            <div class="row justify-content-between my-4">

                                <div class="col">
                                    <label for="customer_id" class="form-label">Customer</label>
                                    <select class="form-control" name="customer_id">
                                        <option selected>-- select --</option>
                                        @foreach($customers as $option)
                                            <option
                                                value="{{$option->id}}" {{isset($data->customer_id) && $data->customer_id === $option->id || old('customer_id') === $option->id ? 'selected' : ''}}>{{$option->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="customer_id" class="form-label">Employee</label>
                                    <select class="form-control" name="employee_id">
                                        <option selected>-- select --</option>
                                        @foreach($employees as $option)
                                            <option
                                                value="{{$option->id}}" {{isset($data->employee_id) && $data->employee_id === $option->id || old('customer_id') === $option->id ? 'selected' : ''}}>{{$option->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="delivery_method" class="form-label">Delivery method</label>
                                    <select class="form-control" name="delivery_method">
                                        <option selected>-- select --</option>
                                        @foreach($delivery_options as $option)
                                            <option
                                                value="{{$option['value']}}" {{isset($data->delivery_method) && $data->delivery_method === $option['value'] ||  old('delivery_method') === $option['value'] ? 'selected' : ''}}>{{$option['label']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row justify-content-between my-4">
                                <div class="col">
                                    <label for="receipt_date" class="form-label">Receipt date</label>
                                    <input type="date" class="form-control" name="receipt_date"
                                           value="{{$data->receipt_date ?? old('receipt_date')}}">
                                </div>

                                <div class="col">
                                    <label for="cutting_date" class="form-label">Cutting date</label>
                                    <input type="date" class="form-control" name="cutting_date"
                                           value="{{$data->cutting_date ?? old('cutting_date')}}">
                                </div>

                                <div class="col">
                                    <label for="sewing_date" class="form-label">Swing date</label>
                                    <input type="date" class="form-control" name="sewing_date"
                                           value="{{$data->sewing_date ?? old('sewing_date')}}">
                                </div>

                            </div>

                            <div class="row justify-content-between my-4">

                                <div class="col">
                                    <label for="packing_date" class="form-label">Packing date</label>
                                    <input type="date" class="form-control" name="packing_date"
                                           value="{{$data->packing_date ?? old('packing_date')}}">
                                </div>

                                <div class="col">
                                    <label for="delivery_date" class="form-label">Cutting date</label>
                                    <input type="date" class="form-control" name="delivery_date"
                                           value="{{$data->delivery_date ?? old('delivery_date')}}">
                                </div>

                                <div class="col">
                                    <label for="delivery_method" class="form-label">Order Status</label>
                                    <select class="form-control" name="status">
                                        <option selected>-- select --</option>
                                        @foreach($status_options as $option)
                                            <option
                                                value="{{$option['value']}}" {{isset($data->status) && $data->status === $option['value'] ||  old('status_options') === $option['value'] ? 'selected' : ''}}>{{$option['label']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row justify-content-between my-4">

                                <div class="col">
                                    <label for="order_type" class="form-label">Order Type</label>
                                    <select class="form-control" name="type">
                                        <option selected>-- select --</option>
                                        @foreach($order_type as $option)
                                            <option
                                                value="{{$option['value']}}" {{isset($data->type) && $data->type === $option['value'] ||  old('type') === $option['value'] ? 'selected' : ''}}>{{$option['label']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row justify-content-around my-4">
                                <div class="col">
                                    <label for="notes" class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes"
                                              rows="3">{{$data->notes ?? old('notes')}}</textarea>
                                </div>

                            </div>

                            <div class="row justify-content-around my-4">
                                <div class="col">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="bundle-tab" data-toggle="tab" href="#bundle" role="tab" aria-controls="bundle" aria-selected="true">Bundle</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">Product</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="inventory" aria-selected="false">Inventory</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="bundle" role="tabpanel" aria-labelledby="bundle-tab">
                                            <div class="row justify-content-end my-4">
                                                <div class="col-2">
                                                    <span class="btn btn-light text-success" onclick="addNewBundleRow()">
                                                        Add more <i class="fa fa-plus " ></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-around my-4">
                                                <div class="col-12 bundles">
                                                    @foreach($data->bundles ?? [] as $index => $bundle)
                                                        <div class="row my-2" id="bundle-row-{{$index}}">
                                                            <div class="col-md-7">
                                                                <select class="form-control" name="bundle_id[]"
                                                                        required="">
                                                                    <option value="">Select One</option>
                                                                    @foreach($bundles ?? [] as $bndl)
                                                                        <option value="{{$bndl->id}}" @if($bndl->id == $bundle->id) selected @endif>{{$bndl->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="number" min="1" required=""
                                                                       placeholder="quantity..." class="form-control"
                                                                       name="bundle_quantity[]" value="{{$bundle->pivot->quantity}}"/>
                                                            </div>
                                                            <div class="col-md-1">
                                                            <span class="fa fa-minus text-danger"
                                                                  onclick="removeHtmlById('bundle-row-{{$index}}')"></span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                                            <div class="row justify-content-end my-4">
                                                <div class="col-2">
                                                    <span class="btn btn-light text-success" onclick="addNewProdRow()">
                                                        Add more <i class="fa fa-plus " ></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-around my-4">
                                                <div class="col-12 prods">
                                                    @foreach($data->products ?? [] as $index => $product)
                                                        <div class="row my-2" id="prod-row-0">
                                                            <div class="col-md-7">
                                                                <select class="form-control" name="product_id[]" required="">
                                                                    <option value="">Select Product</option>
                                                                    @foreach($products ?? [] as $prod)
                                                                        <option value="{{$prod->id}}" @if($prod->id == $product->id) selected @endif>{{$prod->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="number" min="1" required="" placeholder="quantity..." class="form-control" name="product_quantity[]" value="{{$product->pivot->quantity}}"/>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <span class="fa fa-minus text-danger" onclick="removeHtmlById('prod-row-{{$index}}')"></span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">

                                            <div class="row justify-content-around my-4">

                                                <div class="col">
                                                    <label for="name" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{$data->inventoryOrderProducts[0]->name ?? old('name')}}">
                                                </div>

                                                <div class="col">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="number" min="1" class="form-control" name="quantity"
                                                           value="{{$data->inventoryOrderProducts[0]->quantity ?? old('quantity')}}">
                                                </div>

                                                <div class="col">
                                                    <label for="unit" class="form-label">Unit</label>
                                                    <input type="text" class="form-control" name="unit"
                                                           value="{{$data->inventoryOrderProducts[0]->unit ?? old('unit')}}">
                                                </div>
                                            </div>

                                            <div class="row justify-content-around my-4">

                                                <div class="col">
                                                    <label for="length" class="form-label">Length</label>
                                                    <input type="number" min="1" class="form-control" name="length"
                                                           value="{{$data->inventoryOrderProducts[0]->length ?? old('length')}}">
                                                </div>

                                                <div class="col">
                                                    <label for="width" class="form-label">Width</label>
                                                    <input type="number" min="1" class="form-control" name="width"
                                                           value="{{$data->inventoryOrderProducts[0]->width ?? old('width')}}">
                                                </div>

                                                <div class="col">
                                                    <label for="height" class="form-label">Height</label>
                                                    <input type="number" min="1" class="form-control" name="height"
                                                           value="{{$data->inventoryOrderProducts[0]->height ?? old('height')}}">
                                                </div>
                                            </div>

                                            <div class="row justify-content-end my-4">
                                                <div class="col-2">
                                                    <span class="btn btn-light text-success" onclick="addNewInventoryRow()">
                                                        Add more <i class="fa fa-plus " ></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row justify-content-around my-4">
                                                <div class="col-12 inventories">
                                                    @foreach($data->inventoryOrderProducts[0]->inventories ?? [] as $inventory)
                                                        <div class="row my-2" id="inventory-row-0">
                                                            <div class="col-md-11">
                                                                <select class="form-control" name="inventory_id[]"
                                                                        required="">
                                                                    <option value="">Select Product</option>
                                                                    @foreach($inventories as $invntry)
                                                                        <option value="{{$invntry->id}}" @if($invntry->id == $inventory->id) selected @endif>{{$invntry->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-1">
                                                            <span class="fa fa-minus text-danger"
                                                                  onclick="removeHtmlById('prod-row-{{$index}}')"></span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.orders.scripts.scripts')
</x-dashboard>
