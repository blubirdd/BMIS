<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;



class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $barangays = Resident::All();
//
//        return view('barangay.resident.create', compact('barangays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        $barangay = Resident::find($id);
        $barangayName = $request->input('name');

        return view('barangay.resident.create', compact('barangayName', 'barangay'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $barangay_id)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        $resident = Resident::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'address' => $request->address,
            'email' => $request->email,
            'barangay_id' => $barangay_id, // automatically store the barangay_id
        ]);

        return redirect('/barangay/' . $barangay_id . '/resident')
            ->with('success','Resident "'. $request->lastname. " ".$request->firstname. '" added successfully.' );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($barangay_id, Resident $resident)
    {
        return view('barangay.resident.edit', compact('barangay_id', 'resident'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $barangay_id, $resident_id)
    {
        $resident = Resident::findOrFail($resident_id);

        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);

        $resident->lastname = $request->input('lastname');
        $resident->firstname = $request->input('firstname');
        $resident->middlename = $request->input('middlename');
        $resident->address = $request->input('address');
        $resident->email = $request->input('email');

        $resident->save();

        return redirect()->route('barangay.resident.index', $barangay_id)
            ->with('success', 'Resident "'. $resident->lastname. " ".$resident->firstname. '" updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barangay_id, Resident $resident)
    {
        $resident->delete();
        return redirect('/barangay/' . $barangay_id . '/resident')
            ->with('success','Resident "'. $resident->lastname. " ".$resident->firstname. '" deleted successfully.' );
    }
}
