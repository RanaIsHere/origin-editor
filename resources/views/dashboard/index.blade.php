@extends('preload.default')

@section('container')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100">
                    <a class="nav-link active" aria-current="page" href="/dashboard/vehicles">Vehicles</a>
                    <a class="nav-link" href="/dashboard/customers">Customers</a>
                    <a class="nav-link" href="/dashboard/transactions">Transactions</a>
                    <a class="nav-link" href="/dashboard/reports">Reports</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row" style="--bs-gutter-x: 0rem;">
        <div class="col-4">
            <div class="container" style="background-color: rgb(240, 240, 240);">
                <p class="fs-4 text-center">Vehicle Registration</p>

                <form action="/dashboard/vehicles/create" method="post">
                    @csrf

                    <div class="card-body">
                        {{-- <div class="form-group">
                            <label for="vehicleCode">Vehicle Code</label>
                            <input type="text" class="form-control" name="vehicle_code" id="vehicleCode"
                                placeholder="Enter vehicle code">
                        </div> --}}

                        <div class="form-group">
                            <label for="vehicleBrand">Vehicle Brand</label>
                            <input type="text" class="form-control" name="vehicle_brand" id="vehicleBrand"
                                placeholder="Enter vehicle brand">
                        </div>

                        <div class="form-group">
                            <label for="vehicleType">Vehicle Type</label>
                            {{-- <input type="text" class="form-control" name="vehicle_type" id="vehicleType" placeholder="Enter vehicle type"> --}}
                            <select name="vehicle_type" class="form-control" id="vehicleType">
                                @foreach ($vehicleList as $v)
                                    <option value="{{ $v }}"> {{ $v }} </option>
                                @endforeach
                                {{-- <option value="CONVERTIBLE"> CONVERTIBLE </option>
                                <option value="COUPE">COUPE</option>
                                <option value="SPORTS">SPORTS</option>
                                <option value="SUV">SUV</option>
                                <option value="MINIVAN">MINIVAN</option> --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="vehicleColor">Vehicle Color</label>
                            <input type="text" class="form-control" name="vehicle_color" id="vehicleColor"
                                placeholder="Enter vehicle color">
                        </div>

                        <div class="form-group">
                            <label for="vehiclePrice">Vehicle Price</label>
                            <input type="number" class="form-control" name="vehicle_price" id="vehiclePrice"
                                placeholder="Enter vehicle price">
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicleImage">Vehicle Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="vehicle_image" id="vehicleImage">
                                </div>
                            </div>
                            {{-- <input type="text" class="form-control" name="vehicle_image" id="vehicleImage" placeholder="Enter vehicle image (PLACEHOLDER)"> --}}
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
                <p class="fs-4 text-center">Vehicle Lists</p>

                <table class="table table-striped projects" id="vehicleTableList">
                    <thead>
                        <tr>
                            <th style="width: 10%" class="text-center">
                                Vehicle Code
                            </th>
                            <th style="width: 15%" class="text-center">
                                Vehicle Brand
                            </th>
                            <th style="width: 10%" class="text-center">
                                Vehicle Type
                            </th>
                            <th style="width: 5%" class="text-center">
                                Vehicle Color
                            </th>
                            <th style="width: 20%" class="text-center">
                                Vehicle Price
                            </th>
                            <th style="width: 5%" class="text-center">
                                Available
                            </th>
                            <th style="width: 20%" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicleData as $v)
                            <tr>
                                <td class="text-center">
                                    <a>
                                        {{ $v->vehicle_code }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{ $v->vehicle_brand }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{ $v->vehicle_type }}
                                    </a>
                                </td>
                                <td class="vehicle-color text-center">
                                    <a>
                                        {{ $v->vehicle_color }}
                                    </a>
                                </td>
                                <td class="vehicle-price text-center">
                                    <a>
                                        Rp. {{ $v->vehicle_price }}
                                    </a>
                                </td>
                                <td class="vehicle-price text-center">
                                    <a>
                                        {{ $v->available }}
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder">
                                            View
                                        </i>
                                    </button>
                                    
                                    {{-- <button class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                            Edit
                                        </i>
                                    </button>
                                    
                                    <button class="btn btn-danger btn-sm">
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