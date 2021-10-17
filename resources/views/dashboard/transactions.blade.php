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
                    <a class="nav-link" aria-current="page" href="/dashboard/customers">Customers</a>
                    <a class="nav-link active" href="/dashboard/transactions">Transactions</a>
                    <a class="nav-link" href="/dashboard/reports">Reports</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row" style="--bs-gutter-x: 0rem;">
        <div class="col-md-4">
            <div class="container d-flex justify-content-center flex-column" style="background-color: rgb(240, 240, 240); width: 80%" id="choiceBetweenCashCredit"> 
                <button type="button" class="btn btn-success btn-lg mb-3 mt-3 cashBtn"> Cash </button>
                <button type="button" class="btn btn-success btn-lg mb-3 creditBtn"> Credit </button>
                {{-- <button type="button" class="btn btn-success btn-lg mb-3 packageBtn"> Packages </button> --}}
            </div>

            {{-- <div class="container" id="transactionByPackage" style="display: none; background-color: rgb(240, 240, 240);">
                <p class="fs-4 text-center"> Credit Packages </p>

                <form action="/dashboard/transactions/createPackages" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="packageCode">Package Code</label>
                            <input type="text" class="form-control mb-3" name="package_code" id="packageCode" placeholder="Package's code">
                        </div>

                        <div class="form-group">
                            <label for="packagePrice">Package Price</label>
                            <input type="number" class="form-control mb-3" name="package_price" id="packagePrice" placeholder="Package's price">
                        </div>

                        <div class="form-group">
                            <label for="downPayment">Down Payment</label>
                            <input type="number" class="form-control" name="down_payment" id="downPayment" placeholder="Down payment">
                            <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal" data-bs-target="#viewVehicle"> View vehicles </button>
                        </div>

                        <div class="form-group">
                            <label for="qtyPkgInst">Quantity of Package Instalment</label>
                            <input type="number" class="form-control" name="package_instalment_quantity" id="qtyPkgInst" placeholder="Quantity of Package's that has instalments...">
                        </div>

                        <div class="form-group">
                            <label for="interest">Interest</label>
                            <input type="number" class="form-control mb-3" name="interest" id="interest" placeholder="Financial interest..">
                        </div>

                        <div class="form-group">
                            <label for="instalmentValue"> Instalment value </label>
                            <input type="number" class="form-control mb-3" name="instalment_value" id="instalmentValue" placeholder="The value of the instalment..">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div> --}}

            <div class="container" id="transactionByCredit" style="display: none; background-color: rgb(240, 240, 240);">
                <p class="fs-4 text-center"> Transaction by Credits </p>

                <form action="/dashboard/transactions/insertCredit" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <label for="cashCode">Credit Code</label>
                            <input type="text" class="form-control mb-3" name="credit_code" id="cashCode" placeholder="Credit's code">
                        </div> --}}

                        <div class="form-group">
                            <label for="clientIdCredit">Client ID</label>
                            <input type="text" class="form-control" name="client_id" id="clientIdCredit" value="" readonly>

                            <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal"
                             data-bs-target="#chooseClients"> Choose Clients </button>
                            {{-- <select class="form-control mb-3" name="client_id" id="clientId">
                                @foreach ($clientData as $cli)
                                    <option value="{{ $cli->client_id }}">{{ $cli->client_id }}</option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="dpPercentage">Percentage of Down Payment</label>
                            {{-- <input type="text" class="form-control" name="package_code" id="packageCode" placeholder="Package's code"> --}}
                            {{-- <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal" data-bs-target="#viewVehicle"> View vehicles </button> --}}

                            {{-- <input type="text" class="form-control" name="down_payment_percentage" id="dpPercentage"> --}}

                            <select name="down_payment_percentage" id="dpPercentage" class="form-control">
                                <option value="20"> 20% </option>
                                <option value="25"> 25% </option>
                                <option value="30"> 30% </option>
                            </select>

                            {{-- <select name="package_code" id="packageCode" class="form-control">
                                @foreach ($packageData as $pkg)
                                    <option value="{{ $pkg->package_code }}"> {{ $pkg->package_code }} (Rp.{{ $pkg->package_price }}) </option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="intPercentage">Interest Choice</label>
                            {{-- <input type="text" class="form-control" name="package_code" id="packageCode" placeholder="Package's code"> --}}
                            {{-- <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal" data-bs-target="#viewVehicle"> View vehicles </button> --}}

                            {{-- <input type="text" class="form-control" name="interest_percentage" id="intPercentage"> --}}

                            <select name="interest_percentage" id="intPercentage" class="form-control">
                                <option value="8"> 1 Year (8%) </option>
                                <option value="9"> 2 Year (9%) </option>
                                <option value="10"> 3 Year (10%) </option>
                            </select>

                            {{-- <select name="package_code" id="packageCode" class="form-control">
                                @foreach ($packageData as $pkg)
                                    <option value="{{ $pkg->package_code }}"> {{ $pkg->package_code }} (Rp.{{ $pkg->package_price }}) </option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="instLength">Instalmnet Length</label>
                            {{-- <input type="text" class="form-control" name="package_code" id="packageCode" placeholder="Package's code"> --}}
                            {{-- <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal" data-bs-target="#viewVehicle"> View vehicles </button> --}}

                            {{-- <input type="text" class="form-control" name="interest_percentage" id="intPercentage"> --}}

                            <select name="instalment_length" id="instLength" class="form-control">
                                <option value="12"> 1 Year </option>
                                <option value="24"> 2 Year </option>
                                <option value="36"> 3 Year </option>
                            </select>

                            {{-- <select name="package_code" id="packageCode" class="form-control">
                                @foreach ($packageData as $pkg)
                                    <option value="{{ $pkg->package_code }}"> {{ $pkg->package_code }} (Rp.{{ $pkg->package_price }}) </option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="vehicleCodeCredit">Vehicle Code</label>
                            <input type="text" class="form-control" name="vehicle_code" id="vehicleCodeCredit" placeholder="Vehicle's code" readonly>
                            <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal" data-bs-target="#viewVehicle"> View vehicles </button>
                        </div>

                        <div class="form-group">
                            <label for="creditDate">Credit Date</label>
                            <input type="date" class="form-control mb-3" name="credit_date" id="creditDate" placeholder="Credit's date">
                        </div>

                        <div class="form-group">
                            <label for="fcIdentity"> Photocopy of Identity</label>
                            <input type="file" class="form-control mb-3" name="fotocopy_of_identity" id="fcIdentity" placeholder="Fotocopy of user identity">
                        </div>
                        
                        <div class="form-group">
                            <label for="fcFamily">Photocopy of Family</label>
                            <input type="file" class="form-control mb-3" name="fotocopy_of_family" id="fcFamily" placeholder="Fotocopy of family documents">
                        </div>

                        <div class="form-group">
                            <label for="fcSalary">Photocopy of Salary</label>
                            <input type="file" class="form-control mb-3" name="fotocopy_of_salary" id="fcSalary" placeholder="Fotocopy of salary reports">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <div class="container" id="transactionByCash" style="display: none; background-color: rgb(240, 240, 240);">
                <p class="fs-4 text-center"> Transaction by Cash </p>

                <form action="/dashboard/transactions/insertCash" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <label for="cashCode">Cash Code</label>
                            <input type="text" class="form-control mb-3" name="cash_code" id="cashCode" placeholder="Cash's code">
                        </div> --}}

                        <div class="form-group">
                            <label for="clientIdCash">Client ID</label>
                            <input type="text" class="form-control" name="client_id" id="clientIdCash" value="" readonly>

                            <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal"
                             data-bs-target="#chooseClients"> Choose Clients </button>
                            {{-- <select class="form-control mb-3" name="client_id" id="clientId">
                                @foreach ($clientData as $cli)
                                    <option value="{{ $cli->client_id }}">{{ $cli->client_id }}</option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="vehicleCodeCash">Vehicle Code</label>
                            <input type="text" class="form-control" name="vehicle_code" id="vehicleCodeCash" placeholder="Vehicle's code" readonly>

                            {{-- <select class="form-control mb-3" name="client_id" id="clientId">
                                @foreach ($vehicleData as $v)
                                    <option value="{{ $v->vehicle_code }}">{{ $v->vehicle_code }}</option>
                                @endforeach
                            </select> --}}

                            <button type="button" role="button" class="btn btn-primary btn-sm mb-3 mt-1" data-bs-toggle="modal"
                             data-bs-target="#viewVehicle"> View vehicles </button>
                        </div>

                        <div class="form-group">
                            <label for="cashDate">Cash Date</label>
                            <input type="date" class="form-control mb-3" name="cash_date" id="cashDate" placeholder="Cash's date" value="{{ now()->format('Y-m-d') }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="vehiclePriceCash">Cash Amount</label>
                            <input type="text" class="form-control mb-3" name="cash_amount" id="vehiclePriceCash" placeholder="Cash's amount" value="" readonly>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="container p-3 mb-3 mt-3 border border-dark">
                <p class="fs-4 text-center">Customer Lists</p>

                {{-- <div class="control-room text-center">
                    <div class="text-center">
                        <button type="button" class="btn btn-success btn-sm nameBtn"> Query by Name </button>
                        <button type="button" class="btn btn-success btn-sm idBtn"> Query by ID </button>
                        <button type="button" class="btn btn-success btn-sm phoneBtn"> Query by Phone </button>
                    </div>

                    <form action="/dashboard/customers/search" method="post" id="queryByName" style="display: none">
                        <div class="form-group">
                            <label for="clientName" class="fw-bold">Client Full Name</label>
                            <input type="text" class="form-control mb-3" id="clientName" placeholder="First name">
                            <input type="text" class="form-control mb-3" id="clientName" placeholder="Last name">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"> Search </button>
                    </form>

                    <form action="/dashboard/customers/search" method="post" id="queryById" style="display: none">
                        <div class="form-group">
                            <label for="clientId" class="fw-bold">Client ID</label>
                            <input type="text" class="form-control mb-3" id="clientId" placeholder="Client identity number">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"> Search </button>
                    </form>

                    <form action="/dashboard/customers/search" method="post" id="queryByPhone" style="display: none">
                        <div class="form-group">
                            <label for="clientPhone" class="fw-bold">Client Phone Number</label>
                            <input type="text" class="form-control mb-3" id="clientPhone" placeholder="Client's phone number">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm"> Search </button>
                    </form>
                </div> --}}

                <table class="table table-striped projects" id="customerTable">
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

                            {{-- <th style="width: 10%" class="text-center">
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientData as $cli)
                            <tr>
                                {{-- <td class="text-center">
                                    <a>
                                        {{ $cli->client_id }}
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
                                {{-- <td class="project-actions text-right">
                                    <button class="btn btn-info btn-sm w-50">
                                        <i class="fas fa-pencil-alt">
                                            Edit
                                        </i>
                                    </button>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container p-3 mb-3 border border-dark" id="cashTable">
                <p class="fs-4 text-center">Transaction by Cash List</p>

                <table class="table table-striped projects" id="transactionCashTable">
                    <thead>
                        <tr>
                            <th style="width: 10%" class="text-center">
                                Cash Code
                            </th>
                            {{-- <th style="width: 15%" class="text-center">
                                Client ID
                            </th> --}}
                            <th style="width: 15%" class="text-center">
                                Vehicle Code
                            </th>
                            <th style="width: 10%" class="text-center">
                                Cash Date
                            </th>
                            <th style="width: 20%" class="text-center">
                                Cash Amount
                            </th>

                            <th style="width: 10%" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cashesData as $cashes)
                        <tr>
                            <td class="text-center">
                                <a>
                                    {{ $cashes->cash_code }}
                                </a>
                            </td>
                            {{-- <td class="text-center">
                                <a>
                                    {{ $cashes->client_id }}
                                </a>
                            </td> --}}
                            <td class="text-center">
                                <a>
                                    {{ $cashes->vehicle_code }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $cashes->cash_date }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $cashes->cash_amount }}
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <form action="/invoice" method="get">
                                    <input type="hidden" name="client_id" value="{{ $cashes->client_id }}">
                                    <input type="hidden" name="vehicle_code" value="{{ $cashes->vehicle_code }}">
                                    
                                    <button class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                            Print
                                        </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container p-3 mb-3 border border-dark" id="creditTable">
                <p class="fs-4 text-center">Transaction by Credit List</p>

                <table class="table table-striped projects" id="transactionCreditTable">
                    <thead>
                        <tr>
                            <th style="width: 10%" class="text-center">
                                Credit Code
                            </th>
                            {{-- <th style="width: 15%" class="text-center">
                                Client ID
                            </th> --}}
                            <th style="width: 15%" class="text-center">
                                Package Code
                            </th>
                            <th style="width: 15%" class="text-center">
                                Vehicle Code
                            </th>
                            <th style="width: 10%" class="text-center">
                                Credit Date
                            </th>
                            <th style="width: 5%" class="text-center">
                                Photocopy of Identity
                            </th>
                            <th style="width: 5%" class="text-center">
                                Photocopy of Family Identity
                            </th>
                            <th style="width: 5%" class="text-center">
                                Photocopy of Salary Report
                            </th>

                            <th style="width: 10%" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creditsData as $crit)
                            <tr>
                                <td class="text-center">
                                    <a>
                                        {{ $crit->credit_code }}
                                    </a>
                                </td>
                                {{-- <td class="text-center">
                                    <a>
                                        {{ $crit->client_id }}
                                    </a>
                                </td> --}}
                                <td class="text-center">
                                    <a>
                                        {{ $crit->package_code }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{ $crit->vehicle_code }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{ $crit->credit_date }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        View
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        View
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a>
                                        View
                                    </a>
                                </td>
                                <td class="project-actions text-right">
                                    <button class="btn btn-warning btn-sm w-100" data-bs-toggle="modal" data-bs-target="#payInstalment">
                                        <i class="fas fa-pencil-alt">
                                            Pay
                                        </i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container p-3 mb-3 border border-dark" id="instalmentTable">
                <p class="fs-4 text-center">Unpaid Instalments List</p>

                <table class="table table-striped projects" id="unpaidInstalmentTable">
                    <thead>
                        <tr>
                            <th style="width: 15%" class="text-center">
                                Credit Code
                            </th>
                            <th style="width: 15%" class="text-center">
                                Instalment Date
                            </th>
                            <th style="width: 10%" class="text-center">
                                Instalment Quantity
                            </th>
                            <th style="width: 20%" class="text-center">
                                Instalment Of
                            </th>
                            <th style="width: 20%" class="text-center">
                                Remaining Instalment
                            </th>
                            <th style="width: 20%" class="text-center">
                                Remaining Price of Instalment
                            </th>

                            <th style="width: 10%" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instalmentData as $inst)
                        <tr>
                            <td class="text-center">
                                <a>
                                    {{ $inst->cash_code }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $inst->client_id }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $inst->vehicle_code }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $inst->cash_date }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $inst->cash_amount }}
                                </a>
                            </td>
                            <td class="project-actions text-right">
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