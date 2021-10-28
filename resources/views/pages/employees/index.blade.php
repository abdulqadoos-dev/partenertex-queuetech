<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Employees</h1>
                        <p class="mb-4">View all Employees</p>
                    </div>
                    <div>
                        <a href="{{route('employees.form')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                @if(session('message')) <x-alert class="alert-success" :message="session('message')"/> @endif

                <table class="table table-borderless" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">job title</th>
                        <th scope="col">phone</th>
                        <th scope="col">email</th>
                        <th scope="col">commission rate</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $item)
                        <tr>
                            <th scope="row">{{$item->name}}</th>
                            <th scope="row">{{$item->job_title}}</th>
                            <th scope="row">{{$item->phone}}</th>
                            <th scope="row">{{$item->email}}</th>
                            <th scope="row">{{$item->commission_rate}}</th>
                            <th scope="row">
                                <a href="{{route('employees.form',['id' => $item->id])}}">
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
