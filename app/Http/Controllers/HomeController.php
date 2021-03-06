<?php

namespace App\Http\Controllers;

use App\Job;
use App\Service;
use App\Sponsor;
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
        if ($id == 1) {
            return view('service-marketing', $vac);
        }else{
            return view('service-web', $vac);
        }
    }

    public function showJobs($id)
    {
        $jobs = DB::table('jobs')->where('subcategory_id',$id)->get();
        $vac = compact('jobs');
        return view('job', $vac);
    }

    public function showSponsors($page)
    {
        $sponsors = Sponsor::where('page',$page)
        ->where('expirated',false)
        ->inRandomOrder()->get();
        $vac = compact('sponsors');
        return view('sponsor.sponsors',$vac);
    }
    
    public function showSponsor($id)
    {
        $sponsor = Sponsor::find($id);
        $vac = compact('sponsor');
        return view('sponsor.sponsor',$vac);
    }
}
