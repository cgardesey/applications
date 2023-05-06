<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware('auth')->only(['index']);
//        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        return view('applicant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateApplicant();

        Applicant::create($attributes);

//        return 'Application successfully submitted!';

//        return back();
//        return redirect()->back()->with('message', 'Application successfully submitted!');
//        return redirect('/applicants');
        return response()->json(array(
            'success' => true
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function validateApplicant()
    {
        return request()->validate([
            'profile_image' => ['required'],
            'last_name' => ['required', 'min:3'],
            'first_name' => ['required', 'min:3'],
//            'other_names' => ['required', 'min:3'],
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'marital_status' => 'required|in:Single,Married',
            'primary_contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
//            'auxiliary_contact' => ['min:12'],
            'email' => ['required', 'email'],
            'postal_address' => ['required', 'min:3'],
            'residential_address' => ['required', 'min:3'],
            'last_educational_institution_attended' => ['required', 'min:3'],
            'highest_educational_level' => ['required', 'min:3'],
//            'occupation' => ['required', 'min:3'],
            'years_of_working_experience' => ['required'],
            'course' => ['required'],
            'cv' => ['required'],
            'highest_educational_cert' => ['required']
        ]);
    }
}
