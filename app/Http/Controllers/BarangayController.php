<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Barangay;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangays = Barangay::All();
//if api
//         return response()->json(['barangays' => $barangays], 200);
          return view('barangay.index', compact('barangays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangay.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'telephone' => 'numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $logoImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $logoImage);
            $input['image'] = "$logoImage";
        }
        Barangay::create($input);
        return redirect()->route('barangay.index')
            ->with('success','Barangay added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barangay = Barangay::find($id);

        return view('barangay.show')->with('barangay', $barangay);
    }

    public function showResidents($id)
    {
        $barangay = Barangay::find($id);

        return view('barangay.resident')->with('barangay', $barangay);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barangay $barangay)
    {
        return view('barangay.edit', compact('barangay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barangay $barangay)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'telephone' => 'numeric',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $logoImage = date('YmdHis') . "." . $image->getClientOriginalName();
            $image->move($destinationPath, $logoImage);
            $input['image'] = "$logoImage";
        } else {
            unset($input['image']);
        }
        $barangay->update($input);
        return redirect()->route('barangay.index')
            ->with('success','Barangay updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barangay $barangay)
    {
        unlink("images/".$barangay->image);


        $barangay->delete();
        return redirect()->route('barangay.index')
            ->with('success','Barangay deleted successfully');
    }

}
