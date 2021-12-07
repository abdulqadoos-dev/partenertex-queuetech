<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Customers</h1>
                        <p class="mb-4">View all customers</p>
                    </div>
                    <div>
                        <a href="{{route('customers.form')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                @if(session('message')) <x-alert class="alert-success" :message="session('message')"/> @endif

                <table class="table table-borderless" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">email</th>
                        <th scope="col">address</th>
                        <th scope="col">city</th>
                        <th scope="col">country</th>
                        <th scope="col">postal code</th>
                        <th scope="col">join source</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $item)
                        <tr>
                            <td><a href="{{route('orders.customer',['customerId' => $item->id])}}">{{$item->name}}</a></td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->city}}</td>
                            <td>{{$item->country}}</td>
                            <td>{{$item->postal_code}}</td>
                            <td>{{$item->join_source}}</td>
                            <td>
                                <a href="{{route('customers.form',['id' => $item->id])}}">
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
