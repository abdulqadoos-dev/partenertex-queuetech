<x-dashboard>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Employees</h1>
                    </div>
                    <div>
                        <a href="{{route('employees')}}" class="btn btn-primary">View all</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form action="{{route('employees.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id ?? old('id')}}">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" required value="{{$data->name ?? old('name')}}" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Job title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="job_title"  value="{{$data->job_title ??  old('job_title')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone"  value="{{$data->phone ??  old('phone')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email"  value="{{$data->email ??  old('email')}}">
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Commission rate</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="commission_rate"  value="{{$data->commission_rate ??  old('commission_rate')}}">
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
</x-dashboard>
