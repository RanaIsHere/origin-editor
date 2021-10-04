<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Origin Editor</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>

    <body>
        @include('partials.modals')

        @include('partials.header')

        <div class="content">
            @yield('container')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="../plugins/jquery/jquery.min.js"></script>
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

        <script>
            $(function () {
                $('.cashBtn').click(function (e) {
                    e.preventDefault();

                    if ($('#transactionByPackage').is(":visible")) {
                        $('#transactionByPackage').hide();
                    }

                    if ($('#transactionByCredit').is(":visible")) {
                        $('#transactionByCredit').hide();
                        $('#transactionByCash').show();
                    } else {
                        $('#transactionByCash').show();
                    }
                });

                $('.creditBtn').click(function (e) {
                    e.preventDefault();

                    if ($('#transactionByPackage').is(":visible")) {
                        $('#transactionByPackage').hide();
                    }

                    if ($('#transactionByCash').is(":visible")) {
                        $('#transactionByPackage').hide();
                        $('#transactionByCash').hide();
                        $('#transactionByCredit').show();
                    } else {
                        $('#transactionByCredit').show();
                    }
                });

                $('.packageBtn').click(function (e) {
                    e.preventDefault();

                    if ($('#transactionByCash').is(":visible")) {
                        $('#transactionByCash').hide();
                    }

                    if ($('#transactionByCredit').is(":visible")) {
                        $('#transactionByPackage').show();
                        $('#transactionByCredit').hide();
                        $('#transactionByCash').hide();
                    } else {
                        $('#transactionByPackage').show();
                    }
                });

                $('.nameBtn').click(function (e) {
                    e.preventDefault();

                    if ($('#queryByName').is(":visible")) {
                        $('#queryByName').hide();
                        
                        if ($('#queryById').is(":visible")) {
                            $('#queryById').hide();
                        }

                        if ($('#queryByPhone').is(":visible")) {
                            $('#queryByPhone').hide();
                        }
                    } else {
                        $('#queryByName').show();

                        if ($('#queryById').is(":visible")) {
                            $('#queryById').hide();
                        }

                        if ($('#queryByPhone').is(":visible")) {
                            $('#queryByPhone').hide();
                        }
                    }
                });

                $('.idBtn').click(function (e) {
                    e.preventDefault();

                    if ($('#queryById').is(":visible")) {
                        $('#queryById').hide();

                        if ($('#queryByName').is(":visible")) {
                            $('#queryByName').hide();
                        }

                        if ($('#queryByPhone').is(":visible")) {
                            $('#queryByPhone').hide();
                        }
                    } else {
                        $('#queryById').show();

                        if ($('#queryByName').is(":visible")) {
                            $('#queryByName').hide();
                        }

                        if ($('#queryByPhone').is(":visible")) {
                            $('#queryByPhone').hide();
                        }
                    }
                });

                $('.phoneBtn').click(function (e) {
                    e.preventDefault();

                    if ($('#queryByPhone').is(":visible")) {
                        $('#queryByPhone').hide();

                        if ($('#queryById').is(":visible")) {
                            $('#queryById').hide();
                        }

                        if ($('#queryByName').is(":visible")) {
                            $('#queryByName').hide();
                        }
                    } else {
                        $('#queryByPhone').show();

                        if ($('#queryById').is(":visible")) {
                            $('#queryById').hide();
                        }

                        if ($('#queryByName').is(":visible")) {
                            $('#queryByName').hide();
                        }   
                    }
                });
            });
        </script>
    </body>
</html>