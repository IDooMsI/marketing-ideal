<?php

namespace App\Http\Controllers;

use App\Job;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showServices($id)
    {
        $services = Service::with('specs')->where('subcategory_id',$id)->get();
        $vac = compact('services');
        return view('service', $vac);
    }

    public function showJobs($id)
    {
        $jobs = DB::table('jobs')->where('subcategory_id',$id)->get();
        $vac = compact('jobs');
        return view('job', $vac);
    }

    public function showSponsors()
    {
        return view('sponsor');
    }
}
