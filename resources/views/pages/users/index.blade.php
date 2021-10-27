<x-dashboard>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="h3 mb-2 text-gray-800">Users</h1>
                        <p class="mb-4">View all users</p>
                    </div>
                    <div>
                        <button class="btn btn-primary">Add New</button>
                    </div>
                </div>


                <table class="table table-borderless" id="data-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Partenertex admin</td>
                        <td>admin@partenertex.com</td>
                        <td>Admin</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>partenertex user</td>
                        <td>user@partenertex.com</td>
                        <td>User</td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-dashboard>
