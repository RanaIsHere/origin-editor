<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Models\Clients;
use App\Models\Cashes;
use App\Models\Credit_packages;
use App\Models\Credits;
use App\Models\Instalments;

class DashboardController extends Controller
{
    // Default pages

    public function defaultIndex() {
        $vehicleData = Vehicles::all();
        return view('dashboard.index', ['page' => 'Vehicles', 'vehicleData' => $vehicleData]);
    }

    public function defaultCustomers() {
        $clientData = Clients::all();
        return view('dashboard.customers', ['page' => 'Customers', 'clientData' => $clientData]);
    }

    public function defaultTransactions() {
        $cashesData = Cashes::all();
        $creditsData = Credits::all();
        $clientData = Clients::all();
        $packageData = Credit_packages::all();
        $instalmentData = Instalments::all();
        return view('dashboard.transactions', ['page' => 'Transactions', 'cashesData' => $cashesData, 'creditsData' => $creditsData, 'clientData' => $clientData, 'packageData' => $packageData, 'instalmentData' => $instalmentData]);
    }

    // Models functions

    public function addVehicles(Request $request) {
        $validatedData = $request->validate([
            'vehicle_code' => ['required'],
            'vehicle_brand' => ['required'],
            'vehicle_type' => ['required'],
            'vehicle_color' => ['required'],
            'vehicle_price' => ['required'],
            'vehicle_image' => ['required']
        ]);
        
        // dd($validatedData);

        Vehicles::create($validatedData);

        return redirect('/dashboard/vehicles');
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
            'cash_code' => ['required'],
            'client_id' => ['required'],
            'vehicle_code' => ['required'],
            'cash_date' => ['required'],
            'cash_amount' => ['required']
        ]);

        Cashes::create($validatedData);

        return redirect('/dashboard/transactions/');
    }

    public function insertTransactionByCredit(Request $request) {
        $validatedData = $request->validate([
            'credit_code' => ['required'],
            'client_id' => ['required'],
            'package_code' => ['required'],
            'vehicle_code' => ['required'],
            'credit_date' => ['required'],
            'fotocopy_of_identity' => ['required'],
            'fotocopy_of_family' => ['required'],
            'fotocopy_of_salary' => ['required']
        ]);

        
        

        // dd($validatedData);

        Credits::create($validatedData);

        return redirect('/dashboard/transactions/');
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
