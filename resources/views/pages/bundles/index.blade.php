<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Bundles</h1>
                        <p class="mb-4">View all Bundles</p>
                    </div>
                    <div>
                        <a href="{{route('bundles.form')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                @if(session('message')) <x-alert class="alert-success" :message="session('message')"/> @endif

                <table class="table table-borderless" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">no of products</th>
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bundles as $item)
                        <tr>
                            <th scope="row">{{$item->name}}</th>
                            <th scope="row">{{$item->products->count()}}</th>
                            <th scope="row">
                                <a href="{{route('bundles.form',['id' => $item->id])}}">
                                    <i class="fa fa-pen-alt text-warning"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="document.getElementById('form-{{$item->id}}').submit();">
                                    <i class="fa fa-trash-alt text-danger"></i>
                                    <form method="post" id="form-{{$item->id}}" action="{{route('bundles.delete', ['id' => $item->id])}}" onsubmit="return confirm('Are you sure you want to delete this')">
                                        @csrf
                                        @method('Delete')
                                    </form>
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
