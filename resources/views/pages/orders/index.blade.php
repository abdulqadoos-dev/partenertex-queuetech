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
                        <th scope="col">type</th>
                        <th scope="col">status</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $item)
                        <tr>
                            <td >{{$item->order_no}}</td>
                            <td>{{$item->customer->name}}</td>
                            <td>{{$item->employee->name}}</td>
                            <td>
                                @foreach($delivery_options as $key => $option)
                                    @if($option['value'] === $item->delivery_method) {{$option['label']}} @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($type_options as $key => $option)
                                    @if($option['value'] === $item->type) {{$option['label']}} @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($status_options as $key => $option)
                                  @if($option['value'] === $item->status)  <span class="badge badge-{{$option['class']}}">{{$option['label']}}</span> @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('orders.form',['id' => $item->id])}}">
                                    <i class="fa fa-pen-alt text-warning"></i>
                                </a>

                                <a href="{{route('orders.details',['id' => $item->id])}}">
                                    <i class="fa fa-list-alt ml-2 text-primary"></i>
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
