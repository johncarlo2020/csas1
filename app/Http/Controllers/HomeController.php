<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function staffHome()
    {
        $users = DB::select("SELECT * FROM csas1.users where user_type_id = 3;");
        $files = DB::select("SELECT * FROM requirements;");
        return view('staff/staffHome',compact('users','files'));
    }
    public function coordinatorHome()
    {
        $users = DB::select("SELECT * FROM csas1.users where user_type_id = 5;");
        return view('coordinator/coordinatorHome',compact('users'));
    }
    public function applicantHome()
    {
        return view('applicant/applicantHome');
    }
    public function examSchedule(){
        $exams = DB::select("SELECT * FROM csas1.exams;");
        return  $exams;

    }
}
