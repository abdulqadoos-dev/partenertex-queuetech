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
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{$customer->name}}</th>
                            <th scope="row">{{$customer->phone}}</th>
                            <th scope="row">{{$customer->email}}</th>
                            <th scope="row">{{$customer->address}}</th>
                            <th scope="row">{{$customer->city}}</th>
                            <th scope="row">{{$customer->country}}</th>
                            <th scope="row">{{$customer->postal_code}}</th>
                            <th scope="row">{{$customer->join_source}}</th>
                            <th scope="row">{{$customer->note}}</th>
                            <th scope="row">
                                <a href="{{route('customers.form',['id' => $customer->id])}}">
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
