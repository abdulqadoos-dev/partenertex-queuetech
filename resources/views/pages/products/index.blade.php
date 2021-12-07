<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Products</h1>
                        <p class="mb-4">View all products</p>
                    </div>
                    <div>
                        <a href="{{route('products.form')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                @if(session('message'))
                    <x-alert class="alert-success" :message="session('message')"/> @endif

                <table class="table table-borderless" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">category</th>
                        <th scope="col">description</th>
                        <th scope="col">unit sales price</th>
                        <th scope="col">unit buy price</th>
                        <th scope="col">stock</th>
                        <th scope="col">sku</th>
                        <th scope="col">upc</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->unit_sale_price}}</td>
                            <td>{{$item->unit_buy_price}}</td>
                            <td>{{$item->stock}}</td>
                            <td>{{$item->sku}}</td>
                            <td>{{$item->upc}}</td>
                            <td>
                                <a href="{{route('products.form',['id' => $item->id])}}">
                                    <i class="fa fa-pen-alt text-warning"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-dashboard>
