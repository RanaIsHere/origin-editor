<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <style>
            @media print {
                .controls button {
                    display: none;
                }
            }
        </style>
    </head>

    <body>
        <div class="controls d-flex justify-content-between p-2">
            <button class="btn btn-primary btn-lg returnBtn">
                Return
            </button>

            <button class="btn btn-success btn-lg printBtn">
                Print
            </button>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($cashesData as $c)
                <div class="title text-center">
                    <h1> Origin Engine </h1>
                </div>

                <div class="body border border-dark border-2 p-5">
                    <div class="short-description text-justify">
                        <p> Date: {{ $c->cash_date }}</p>
                        <p> Type: Cash</p>
                    </div>

                    <br>

                    <div class="summary">
                        <p> <b> Purchase Summary </b> </p>


                        <i> Vehicle </i>
                        <div class="vehicle-list d-flex justify-content-between text-danger.">
                            @foreach ($vehicleData as $v)
                                <p> - {{ $v->vehicle_code }} </p>
                                <p> Rp. {{ $v->vehicle_price }} </p>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="customer-information mt-2 border border-dark border-2 p-5">
                    <div class="short-description text-justify">
                        @foreach ($clientData as $cli)
                            <p> Customer Name: {{ $cli->client_name }}</p>
                            <p> Address: {{ $cli->client_address }}</p>
                            <p> Phone Number: {{ $cli->client_phone }}</p>
                        @endforeach
                    </div>

                    <br>

                    <div class="summary">
                        <p> <b> Purchase Summary </b> </p>


                        <i> Vehicle </i>

                        <table class="table table-striped projects mt-2" id="vehicleTableListInvoice">
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
                                    </tr>                      
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                    
                @endforeach
            </div>

            Copyright (C) Origin Engine: 100BC to 2021 <br>
            Without compromise, and we deliver
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="../plugins/jquery/jquery.min.js"></script>
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

        <script>
            $(function () {
                $('.returnBtn').click(function (e) {
                    window.open("/dashboard/transactions", "_self");
                });

                $('.printBtn').click(function (e) {
                    window.print();
                });
            });
        </script>
    </body>
</html>