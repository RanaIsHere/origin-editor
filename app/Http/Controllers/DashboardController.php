<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Models\Clients;
use App\Models\Cashes;
use App\Models\Credit_packages;
use App\Models\Credits;
use App\Models\Instalments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Default pages

    public function defaultIndex() {
        $vehicleData = Vehicles::all();
        // Limit a model to all available vehicles only (untested)
        // $vehicleData = Vehicles::where('available', 1)->all();
        $vehicleList = ['SEDAN', 'CONVERTIBLE', 'COUPE', 'SPORTS', 'SUV', 'MINIVAN'];
        return view('dashboard.index', ['page' => 'Vehicles', 'vehicleData' => $vehicleData, 'vehicleList' => $vehicleList]);
    }

    public function defaultCustomers() {
        $clientData = Clients::all();
        return view('dashboard.customers', ['page' => 'Customers', 'clientData' => $clientData]);
    }

    public function getInvoices(Request $request) 
    {
        $clientData = Clients::all()->where('client_id', $request->client_id);
        $creditsData = Credits::all()->where('client_id', $request->client_id);
        $vehicleData = Vehicles::all()->where('vehicle_code', $request->vehicle_code);
        $cashesData = Cashes::all()->where('client_id', $request->client_id)->where('vehicle_code', $request->vehicle_code);

        return view('dashboard.invoice', ['clientData' => $clientData, 'cashesData' => $cashesData, 'creditsData' => $creditsData, 'vehicleData' => $vehicleData]);
    }

    public function defaultTransactions() {
        $vehicleData = Vehicles::all();
        // Limit a model to all available vehicles only (untested)
        $vehicleData = Vehicles::all()->where('available', 1);
        $cashesData = Cashes::all();
        $creditsData = Credits::all();
        $clientData = Clients::all();
        $packageData = Credit_packages::all();
        $instalmentData = Instalments::all();
        return view('dashboard.transactions', ['page' => 'Transactions', 'cashesData' => $cashesData, 'creditsData' => $creditsData, 'clientData' => $clientData, 'packageData' => $packageData, 'instalmentData' => $instalmentData, 'vehicleData' => $vehicleData]);
    }

    // Models functions

    public function addVehicles(Request $request) {
        $validatedData = $request->validate([
            // 'vehicle_code' => ['required'],
            'vehicle_brand' => ['required'],
            'vehicle_type' => ['required'],
            'vehicle_color' => ['required'],
            'vehicle_price' => ['required'],
            'vehicle_image' => ['required']
        ]);

        $vehicle = new Vehicles;

        $vehicle->vehicle_code = $request->vehicle_brand . date('Y');
        $vehicle->vehicle_brand = $validatedData['vehicle_brand'];
        $vehicle->vehicle_type = $validatedData['vehicle_type'];
        $vehicle->vehicle_color = $validatedData['vehicle_color'];
        $vehicle->vehicle_price = $validatedData['vehicle_price'];
        $vehicle->vehicle_image = $validatedData['vehicle_image'];
    
        if ($vehicle->save()) {
            $tempId = $vehicle->id;
            Vehicles::where('vehicle_id', $tempId)->update(['vehicle_code' => $vehicle->vehicle_code . $tempId]);

            if ($vehicle->save()) {
                return redirect('/dashboard/vehicles')->with('success', 'Vehicle succesfully inserted');
            }
        }

        // Vehicles::create([
        //     'vehicle_code' => $vehicleCode,
        //     'vehicle_brand' => $validatedData['vehicle_brand'],
        //     'vehicle_type' => $validatedData['vehicle_type'],
        //     'vehicle_color' => $validatedData['vehicle_color'],
        //     'vehicle_price' => $validatedData['vehicle_price'],
        //     'vehicle_image' => $validatedData['vehicle_image'],
        // ]);
    }

    public function addClients(Request $request) {
        $validatedData = $request->validate([
            'client_id' => ['required'],
            'client_name' => ['required'],
            'client_address' => ['required'],
            'client_phone' => ['required']
        ]);

        Clients::create($validatedData);

        return redirect('/dashboard/customers');
    }

    public function insertTransactionByCash(Request $request) {
        $validatedData = $request->validate([
            // 'cash_code' => ['required'],
            'client_id' => ['required'],
            'vehicle_code' => ['required'],
            // 'cash_date' => ['required'],
            'cash_amount' => ['required']
        ]);

        $cashes = new Cashes;

        $cashes->client_id = $validatedData['client_id'];
        $cashes->vehicle_code = $validatedData['vehicle_code'];
        // $cashes->cash_date = $validatedData['cash_date'];
        $cashes->cash_date = now()->format('Y-m-d');
        $cashes->cash_amount = $validatedData['cash_amount'];

        if ($cashes->save()) {
            $tempId = $cashes->id;
            Vehicles::where('vehicle_code', $cashes->vehicle_code)->update(['available' => 0]);

            if ($cashes->save()) {
                // $rt = route('invoice', ['client_id' => $validatedData['client_id'], 'vehicle_code' => $validatedData['vehicle_code']]);
                // return redirect($rt)->with('success', 'Vehicle purchased successfully');
                return redirect('/dashboard/transactions')->with('success', 'Vehicle purchased successfully');
            }
        }

        // return redirect('/dashboard/transactions/');
    }

    public function insertTransactionByCredit(Request $request) {
        $validatedData = $request->validate([
            // 'credit_code' => ['required'],
            'client_id' => ['required'],
            'down_payment_percentage' => ['required'],
            'interest_percentage' => ['required'],
            'instalment_length' => ['required'],
            'vehicle_code' => ['required'],
            'credit_date' => ['required'],
            'fotocopy_of_identity' => ['required'],
            'fotocopy_of_family' => ['required'],
            'fotocopy_of_salary' => ['required']
        ]);

        $creditCode = 'CR' . date('Y') . date('M');

        $transactionByCredit = new Credits;

        $transactionByCredit->credit_code = $creditCode;
        $transactionByCredit->client_id = $validatedData['client_id'];
        $transactionByCredit->package_code = '0';
        $transactionByCredit->vehicle_code = $validatedData['vehicle_code'];
        $transactionByCredit->credit_date = $validatedData['credit_date'];
        $transactionByCredit->fotocopy_of_identity = $validatedData['fotocopy_of_identity'];
        $transactionByCredit->fotocopy_of_family = $validatedData['fotocopy_of_family'];
        $transactionByCredit->fotocopy_of_salary = $validatedData['fotocopy_of_salary'];

        if ($transactionByCredit->save()) {
            $tempId = $transactionByCredit->id;
            $vehicles = Vehicles::where('vehicle_code', $validatedData['vehicle_code'])->first();
            Vehicles::where('vehicle_code', $transactionByCredit->vehicle_code)->update(['available' => 0]);

            Credits::where('credit_id', $tempId)->update(['credit_code' => $transactionByCredit->credit_code . $tempId]);

            $creditPackages = new Credit_packages;

            $DP = $vehicles->vehicle_price * ((int)$validatedData['down_payment_percentage']/100);
            // echo('<script> alert(' . $validatedData['interest_percentage'] . ') </script>');

            $INTCALC = ((int)$validatedData['interest_percentage']/100);

            if ($validatedData['interest_percentage'] == "8") {
                $INTCALC = ((int)$validatedData['interest_percentage']/100) * 1;
            } else if ($validatedData['interest_percentage'] == "9") {
                $INTCALC = ((int)$validatedData['interest_percentage']/100) * 2;
            } else if ($validatedData['interest_percentage'] == "10") { 
                $INTCALC = ((int)$validatedData['interest_percentage']/100) * 3;
            }

            echo('<script> alert(' . $INTCALC . ') </script>');

            $creditPackages->package_price = $vehicles->vehicle_price - $DP;
            $creditPackages->down_payment = $DP;
            $creditPackages->interest = ($vehicles->vehicle_price - $DP) * $INTCALC;

            $INSTFUCKYOU = (($vehicles->vehicle_price - $DP) + (($vehicles->vehicle_price - $DP) * $INTCALC));
            $creditPackages->instalment_value = $INSTFUCKYOU / ((int)$validatedData['instalment_length']); 
            $creditPackages->package_instalment_quantity = $INSTFUCKYOU * $validatedData['instalment_length'];

            if ($creditPackages->save()) {
                // $transactionByCredit->package_code = $creditPackages->id;
                Credits::where('credit_id', $tempId)->update(['package_code' => $creditPackages->id]);

                $instalmentCredits = new Instalments;

                $instalmentCredits->credit_code = $transactionByCredit->credit_code;
                $instalmentCredits->instalment_date = $validatedData['credit_date'];
                $instalmentCredits->instalment_quantity = $creditPackages->instalment_value;
                $instalmentCredits->instalment_of = Instalments::where('credit_code', $transactionByCredit->credit_code)->max('instalment_of');
                // $instalmentCredits->
                // $instalmentCredits->instalment_remaining 

                if ($instalmentCredits->save()) {
                    if ($transactionByCredit->save()) {
                        return redirect('/dashboard/transactions/')->with('Customer has successfully paid with credits, with instalment in their account.');
                    }
                }
            }
            
        }

        // dd($validatedData);

        // Credits::create($validatedData);

        
    }

    public function createPackages(Request $request) {
        $validatedData = $request->validate([
            'package_code' => ['required'],
            'package_price' => ['required'],
            'down_payment' => ['required'],
            'package_instalment_quantity' => ['required'],
            'interest' => ['required'],
            'instalment_value' => ['required']
        ]);

        // dd($validatedData);

        Credit_packages::create($validatedData);

        return redirect('/dashboard/transactions/');
    }
}
