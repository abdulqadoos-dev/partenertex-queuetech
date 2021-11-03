<x-dashboard>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Bundles</h1>
                        <p class="mb-4">Proceed to create or update bundle</p>

                    </div>
                    <div>
                        <a href="{{route('bundles')}}" class="btn btn-primary">View all</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="{{route('bundles.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id ?? old('id')}}">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" required value="{{$data->name ?? old('name')}}" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Products</label>
                                <div class="col-sm-10 bundle-prods">
                                    @if(isset($data->products))
                                        @foreach($data->products as $index => $prod)
                                            <div class="row mt-2" id="prod-row-{{$index}}">
                                                <div class="col-md-7">
                                                    <select class="form-control" name="product_id[]" required>
                                                        <option value="">select one</option>
                                                        @foreach($products as $product)
                                                            <option value="{{$product->id}}" @if($prod->id == $product->id) selected @endif>{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" min="0" required placeholder="quantity..." class="form-control" name="quantity[]"  value="{{$prod->pivot->quantity ?? 0}}">
                                                </div>
                                                <div class="col-md-1">
                                                    @if($index == 0)<span class="fa fa-plus text-success" onclick="addNewProdRow()"></span>@endif
                                                    @if($index != 0)<span class="fa fa-minus text-danger" onclick="removeHtmlById('prod-row-{{$index}}')"></span>@endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row" id="prod-row-0">
                                            <div class="col-md-7">
                                                <select class="form-control" name="product_id[]" required>
                                                    <option value="">select one</option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="number" min="0" required placeholder="quantity..." class="form-control" name="quantity[]"  value="{{$data->unit ??  old('unit')}}">
                                            </div>
                                            <div class="col-md-1">
                                                <span class="fa fa-plus text-success" onclick="addNewProdRow()"></span>
                                            </div>
                                        </div>
                                    @endif()
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <span class="col-sm-2 col-form-label"></span>
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
    @include('pages.bundles.scripts.scripts')
</x-dashboard>
