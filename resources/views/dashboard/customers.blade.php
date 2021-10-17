@extends('preload.default')

@section('container')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100">
                    <a class="nav-link" href="/dashboard/vehicles">Vehicles</a>
                    <a class="nav-link active" aria-current="page" href="/dashboard/customers">Customers</a>
                    <a class="nav-link" href="/dashboard/transactions">Transactions</a>
                    <a class="nav-link" href="/dashboard/reports">Reports</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row" style="--bs-gutter-x: 0rem;">
        <div class="col-4">
            <div class="container" style="background-color: rgb(240, 240, 240);">
                <p class="fs-4 text-center">Customer Registration</p>

                <form action="/dashboard/customers/create" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="clientId">Client ID</label>
                            <input type="text" class="form-control" name="client_id" id="clientId" placeholder="Client identity number">
                        </div>

                        <div class="form-group">
                            <label for="clientName">Client Full Name</label>
                            <input type="text" class="form-control mb-3" name="client_name" id="clientName" placeholder="Client's full name">
                        </div>

                        <div class="form-group">
                            <label for="clientAddress">Client Address</label>
                            <input type="text" class="form-control" name="client_address" id="clientAddress" placeholder="Client's address">
                        </div>

                        <div class="form-group">
                            <label for="clientPhone">Client Phone Number</label>
                            <input type="text" class="form-control" name="client_phone" id="clientPhone" placeholder="Client's phone number">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col">
            <div class="container p-3">
                <p class="fs-4 text-center">Customer Lists</p>

                {{-- <div class="control-room">
                    <div class="text-center">
                        <button type="button" class="btn btn-success btn-sm nameBtn"> Query by Name </button>
                        <button type="button" class="btn btn-success btn-sm idBtn"> Query by ID </button>
                        <button type="button" class="btn btn-success btn-sm phoneBtn"> Query by Phone </button>
                    </div>

                    <form action="/dashboard/customers/search" method="post" id="queryByName" style="display: none">
                        <div class="form-group">
                            <label for="clientName">Client Full Name</label>
                            <input type="text" class="form-control mb-3" id="clientName" placeholder="First name">
                            <input type="text" class="form-control mb-3" id="clientName" placeholder="Last name">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"> Search </button>
                    </form>

                    <form action="/dashboard/customers/search" method="post" id="queryById" style="display: none">
                        <div class="form-group">
                            <label for="clientId">Client ID</label>
                            <input type="text" class="form-control mb-3" id="clientId" placeholder="Client identity number">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"> Search </button>
                    </form>

                    <form action="/dashboard/customers/search" method="post" id="queryByPhone" style="display: none">
                        <div class="form-group">
                            <label for="clientPhone">Client Phone Number</label>
                            <input type="text" class="form-control mb-3" id="clientPhone" placeholder="Client's phone number">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm"> Search </button>
                    </form>
                </div> --}}

                <table class="table table-striped projects" id="customerTablePage">
                    <thead>
                        <tr>
                            {{-- <th style="width: 10%" class="text-center">
                                Client ID
                            </th> --}}
                            <th style="width: 15%" class="text-center">
                                Client Name
                            </th>
                            <th style="width: 15%" class="text-center">
                                Client Address
                            </th>
                            <th style="width: 10%" class="text-center">
                                Client Phone Number
                            </th>

                            <th style="width: 10%" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientData as $cli)
                            <tr>
                                {{-- <td class="text-center">
                                    <a>
                                        2102101203021
                                    </a>
                                </td> --}}
                                <td class="text-center">
                                    <a>
                                        {{ $cli->client_name }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{ $cli->client_address }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{ $cli->client_phone }}
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                            Edit
                                        </i>
                                    </button>
                                    
                                    {{-- <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                            Delete
                                        </i>
                                    </button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection