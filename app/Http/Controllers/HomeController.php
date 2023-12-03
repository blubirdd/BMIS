<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barangays = Barangay::All()->count();
        $countByCity = Barangay::distinct('city')->count('city');
        $complaints = Resident::All()->where('status','=','Ongoing')->count();

        $residentsByBarangay = Resident::select(DB::raw('barangays.name as barangay_name, count(*) as residents_count'))
            ->join('barangays', 'barangays.id', '=', 'residents.barangay_id')
            ->groupBy('barangays.name')
            ->get();

        $complaintsByBarangay = Resident::select(DB::raw('barangays.name as barangay_name, count(*) as complaints_count'))
            ->join('barangays', 'barangays.id', '=', 'residents.barangay_id')
            ->where('status', '=', 'Ongoing')
            ->groupBy('barangays.name')
            ->get();

        foreach ($residentsByBarangay as $resident) {
            $barangayResidentArray[] = $resident->barangay_name;
            $residentsArray[] = $resident->residents_count;
        }

        foreach ($complaintsByBarangay as $complaint) {
            $barangayArray[] = $complaint->barangay_name;
            $complaintsArray[] = $complaint->complaints_count;
        }
        $data = [];
        return view('home', compact('barangays', 'countByCity', 'complaints','barangayArray','complaintsArray',
        'barangayResidentArray','residentsArray'));
    }
}
