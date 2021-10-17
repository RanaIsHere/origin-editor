@if($page == 'Vehicles' OR $page == 'Transactions')
<div class="modal fade" id="viewVehicle" tabindex="-1" aria-labelledby="viewVehicleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewVehicleLabel">Vehicles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-striped projects" id="vehiclePicker">
                    <thead>
                        <tr>
                            <th style="width: 10%" class="text-center">
                                Vehicle Code
                            </th>
                            <th style="width: 15%" class="text-center">
                                Vehicle Brand
                            </th>
                            <th style="width: 15%" class="text-center">
                                Vehicle Type
                            </th>
                            <th style="width: 10%" class="text-center">
                                Vehicle Color
                            </th>
                            <th style="width: 15%" class="text-center">
                                Vehicle Price
                            </th>
                            <th style="width: 15%" class="text-center">
                                Image
                            </th>
                            <th style="width: 5%" class="text-center">
                                Availability
                            </th>
                            <th style="width: 10%" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicleData as $v)
                        {{-- @if($v->available == true) --}}
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
                            <td class="text-center">
                                <a>
                                    {{ $v->vehicle_color }}
                                </a>
                            </td>
                            <td class="text-center text-danger">
                                <a>
                                    {{ $v->vehicle_price }}
                                </a>
                            </td>
                            <td class="text-center text-danger">
                                <a>
                                    <img src="../{{ $v->vehicle_image }}" class="img-fluid">
                                </a>
                            </td>
                            <td class="text-center">
                                <a>
                                    {{ $v->available }}
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <button class="btn btn-info btn-sm w-50 chooseBtn" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-pencil-alt">
                                        Choose
                                    </i>
                                </button>
                            </td>
                        </tr>
                        {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

@if($page == 'Transactions')
<div class="modal fade" id="chooseClients" tabindex="-1" aria-labelledby="chooseClientsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chooseClientsLabel">Clients</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-striped projects" id="clientPicker">
                    <thead>
                        <tr>
                            <th style="width: 10%" class="text-center">
                                Client ID
                            </th>
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
                            <td class="text-center">
                                <a>
                                    {{ $cli->client_id }}
                                </a>
                            </td>
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
                                <button class="btn btn-info btn-sm w-50 chooseBtn" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-pencil-alt">
                                        Choose
                                    </i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

<div class="modal fade" id="payInstalment" tabindex="-1" aria-labelledby="payInstalmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payInstalmentLabel">Pay An Instalment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/transactions/payInstalment" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="instalmentCode">Instalment Code</label>
                        <input type="text" class="form-control mb-3" name="instalment_code" id="instalmentCode"
                            placeholder="Instalment's code">
                    </div>

                    <div class="form-group">
                        <label for="creditCode">Credit Code</label>
                        <input type="text" class="form-control mb-3" name="credit_code" id="creditCode"
                            placeholder="Credit's code">
                    </div>

                    <div class="form-group">
                        <label for="instalmentDate">Instalment Date</label>
                        <input type="date" class="form-control mb-3" name="instalment_date" id="instalmentDate"
                            placeholder="Instalment's date">
                    </div>

                    <div class="form-group">
                        <label for="instalmentQuantity">Instalment Quantity</label>
                        <input type="number" class="form-control mb-3" name="instalment_quantity"
                            id="instalmentQuantity" placeholder="Instalment's quantity">
                    </div>

                    <div class="form-group">
                        <label for="instalmentOf">Instalment Of The </label>
                        <input type="number" class="form-control mb-3" name="instalment_of" id="instalmentOf"
                            placeholder="At what counter instalment does the client have?">
                    </div>

                    <div class="form-group">
                        <label for="instalmentRemaining">Instalment Remaining</label>
                        <input type="number" class="form-control mb-3" name="instalment_remaining"
                            id="instalmentRemaining" placeholder="Instalment's remaining">
                    </div>

                    <div class="form-group">
                        <label for="instalmentRemainingPrice">Instalment Remaining Price</label>
                        <input type="number" class="form-control mb-3" name="instalment_remaining_price"
                            id="instalmentRemainingPrice" placeholder="Instalment's remaining before it is complete">
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>