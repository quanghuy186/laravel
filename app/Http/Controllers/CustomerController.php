<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;

class CustomerController extends Controller
{
    // function index() {
    //     // $customers = DB::table('customers')->get();
    //     $customers = Customer::all();
    //     return view('customers.list', compact('customers'));
    // }

    function index() {
        $customers = Customer::with('city')->get();
        return view('customers.list', compact('customers'));
    }

    function create() {
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }
       
    // function create() {
    //     return view('customers.create');
    // }
    
    // function store(Request $request){
    //     $customer = new Customer();
    //     $customer->name = $request->name;
    //     $customer->email = $request->email;
    //     $customer->dob = $request->dob;
    //     $customer->save();
    //     return redirect()->route('customers.index');
    // }

    function store(Request $request) {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        $customer->city_id = $request->city_id;
        $customer->save();
        return redirect()->route('customers.index');
    }

    function delete(Request $request) {
        // $customer = Customer::findOrFail($request->id);
        // $customer->delete();
        $customer = DB::table('customers')->where('id', '=', $request->id)->delete();
        return redirect()->route('customers.index');
    }

    // function edit(Request $request){
    //     $customer = Customer::findOrFail($request->id);
    //     return view('customers.edit', compact('customer'));
    // }

    function edit(Request $request) {
        $customer = Customer::findOrFail($request->id);
        $cities = City::all();
        return view('customers.edit', compact('customer', 'cities'));
    }
    
    // function update(Request $request) {
    //     $customer = Customer::findOrFail($request->id);
    //     $customer->name = $request->name;
    //     $customer->email = $request->email;
    //     $customer->dob = $request->dob;
    //     $customer->save();
    //     return redirect()->route('customers.index');
    // }

    function update(Request $request) {
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->city_id = $request->city_id;
        $customer->save();
        return redirect()->route('customers.index');
    }

    function search(Request $request) {
        $customers = DB::table('customers')->where('id', '=', $request->id)->get();
        return view('customers.search', compact('customers'));
    }
}