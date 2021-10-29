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
                            <input type="hidden" name="order_id" value="{{$data['order_id'] ?? $data['order_id'] = \Str::upper(\Str::random(15))}}">

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

                            <div class="row justify-content-around my-4">
                                <div class="col">
                                    <label for="notes" class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes"
                                              rows="3">{{$data->notes ?? old('notes')}}</textarea>
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
</x-dashboard>
