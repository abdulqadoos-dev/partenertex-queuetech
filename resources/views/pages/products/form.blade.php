<x-dashboard>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Products</h1>
                        <p class="mb-4">Proceed to create or update product</p>
                    </div>
                    <div>
                        <a href="{{route('products')}}" class="btn btn-primary">View all</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{route('products.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id ?? old('id')}}">

                            <div class="row justify-content-between my-4">

                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control" name="category">
                                        <option selected>-- select --</option>
                                        @foreach($categories as $option)
                                            <option
                                                value="{{$option['value']}}" {{isset($data->category) && $data->category === $option['value'] || old('category') === $option['value'] ? 'selected' : ''}}>{{$option['label']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row justify-content-between my-4">
                                <div class="col">
                                    <label for="receipt_date" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{$data->name ?? old('name')}}">
                                </div>

                                <div class="col">
                                    <label for="unit_sale_price" class="form-label">Unit sale price</label>
                                    <input type="number" class="form-control" name="unit_sale_price"
                                           value="{{$data->unit_sale_price ?? old('unit_sale_price')}}">
                                </div>

                                <div class="col">
                                    <label for="unit_buy_price" class="form-label">Unit buy price</label>
                                    <input type="number" class="form-control" name="unit_buy_price"
                                           value="{{$data->unit_buy_price ?? old('unit_buy_price')}}">
                                </div>



                            </div>

                            <div class="row justify-content-between my-4">
                                <div class="col">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stock"
                                           value="{{$data->stock ?? old('stock')}}">
                                </div>

                                <div class="col">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="number" class="form-control" name="sku"
                                           value="{{$data->sku ?? old('sku')}}">
                                </div>

                                <div class="col">
                                    <label for="upc" class="form-label">UPC</label>
                                    <input type="number" class="form-control" name="upc"
                                           value="{{$data->upc ?? old('upc')}}">
                                </div>
                            </div>



                            <div class="row justify-content-around my-4">
                                <div class="col">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description"
                                              rows="3">{{$data->description ?? old('description')}}</textarea>
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
