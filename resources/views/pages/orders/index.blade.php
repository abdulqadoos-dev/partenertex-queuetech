<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                        <p class="mb-4">View all orders</p>
                    </div>
                    <div>
                        <a href="{{route('orders.form')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                @if(session('message'))
                    <x-alert class="alert-success" :message="session('message')"/> @endif

                <table class="table table-borderless" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">order no</th>
                        <th scope="col">customer</th>
                        <th scope="col">employee</th>
                        <th scope="col">delivery method</th>
                        <th scope="col">status</th>
                        <th scope="col">notes</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $item)
                        <tr>
                            <th >{{$item->order_no}}</th>
                            <th>{{$item->customer->name}}</th>
                            <th>{{$item->employee->name}}</th>
                            <th>{{$item->delivery_method}}</th>
                            <th>{{$item->status}}</th>
                            <th>{{$item->notes}}</th>
                            <th>
                                <a href="{{route('orders.form',['id' => $item->id])}}">
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
