<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;

class ScreeningController extends Controller
{
    public function index()
    {
        return view('screening.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'dob' => 'required|date',
            'headache_frequency' => 'required|in:Monthly,Weekly,Daily',
            'daily_frequency' => $request->headache_frequency === 'Daily' ? 'required|in:1-2,3-4,5+' : '',
        ]);

        $screening = new Screening();
        $screening->first_name = $request->input('first_name');
        $screening->dob = $request->input('dob');
        $screening->headache_frequency = $request->input('headache_frequency');
        $screening->daily_frequency = $request->input('daily_frequency');
        $screening->save();

       
        $dob = $request->input('dob');
        $age = $this->calculateAge($dob);
        
        $message = '';

        if ($age < 18) {
            $message = "Participants must be over 18 years of age";
        } else {
            if ($request->input('headache_frequency') === 'Monthly' || $request->input('headache_frequency') === 'Weekly') {
                $message = "Participant {$request->input('first_name')} is assigned to Cohort A";
            } elseif ($request->input('headache_frequency') === 'Daily') {
                $message = "Participant {$request->input('first_name')} is assigned to Cohort B";
            }
        }

        return view('screening.result')->with('message', $message);
    }

    private function calculateAge($dob)
    {
        return \Carbon\Carbon::parse($dob)->age;
    }
}
