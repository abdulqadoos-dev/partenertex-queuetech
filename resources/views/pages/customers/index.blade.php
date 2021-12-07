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
                        <th scope="col">note</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $item)
                        <tr>
                            <th scope="row"><a href="{{route('orders.customer',['customerId' => $item->id])}}">{{$item->name}}</a></th>
                            <th scope="row">{{$item->phone}}</th>
                            <th scope="row">{{$item->email}}</th>
                            <th scope="row">{{$item->address}}</th>
                            <th scope="row">{{$item->city}}</th>
                            <th scope="row">{{$item->country}}</th>
                            <th scope="row">{{$item->postal_code}}</th>
                            <th scope="row">{{$item->join_source}}</th>
                            <th scope="row">{{$item->note}}</th>
                            <th scope="row">
                                <a href="{{route('customers.form',['id' => $item->id])}}">
                                    <i class="fa fa-pen-alt text-warning"></i>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-dashboard>
