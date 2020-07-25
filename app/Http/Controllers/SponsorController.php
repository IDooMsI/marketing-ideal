<?php

namespace App\Http\Controllers;

use App\Address;
use App\Locality;
use App\Sponsor;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        $vac = compact('sponsors');
        return view('admin.sponsor.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localities = Locality::all();
        $vac = compact('localities');
        return view('admin.sponsor.create', $vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $this->createImage($request);
        $address = $this->createAddress($request);
        $expiration = $this->expirationCalculate($request);
        Sponsor::create([
            'name'  => $request['name'],
            'address_id' => $address->id,
            'page' => $request['page'],
            'facebook'=>$request['facebook'],
            'instagram'=>$request['instagram'],
            'twitter' => $request['twitter'],
            'web' => $request['web'],
            'email' => $request['email'],
            'description' => $request['description'],
            'image' => $image,
            'expiration'=>$request['expiration'],
            'facebook_link'=>$request['facebook-link'],
            'instagram_link' => $request['instagram-link'],
            'twitter_link' => $request['twitter-link'],
            
        ]);

        return redirect()->route('sponsor.index')->with('notice', 'La publicidad ' . $request['name'] . ' ha sido creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        $localities = Locality::all();
        $vac = compact('sponsor', 'localities');
        return view('admin.sponsor.edit', $vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::find($id);
        $name = $sponsor->name;
        if ($request['name'] != $name) {
            $name = $request['name'];
        }

        $address = Address::find($sponsor->address_id);
        $street = $sponsor->address->street;
        $number = $sponsor->address->number;
        if ($request['street'] != $street || $request['number'] != $number ) {
            $address->update([
                'street'=>$request['street'],
                'number'=>$request['number'],
            ]);
        }

        $page = $sponsor->page;
        if($request['page'] != $page){
            $page = $request['page'];
        }

        $facebook = $sponsor->facebook;
        if ($request['facebook'] != $facebook) {
            $facebook = $request['facebook'];
        }
        $facebookLink = $sponsor->facebook_link;
        if ($request['facebook-link'] != $facebookLink) {
            $facebookLink = $request['facebook-link'];
        }

        $instagram = $sponsor->instagram;
        if ($request['instagram'] != $instagram) {
            $instagram = $request['instagram'];
        }
        $instagramLink = $sponsor->instagram_link;
        if ($request['instagram-link'] != $instagramLink) {
            $instagramLink = $request['instagram-link'];
        }

        $twitter = $sponsor->twitter;
        if ($request['twitter'] != $twitter) {
            $twitter = $request['twitter'];
        }
        $twitterLink = $sponsor->twitter_link;
        if ($request['twitter-link'] != $twitterLink) {
            $twitterLink = $request['twitter-link'];
        }

        $web = $sponsor->web;
        if ($request['web'] != $web) {
            $web = $request['web'];
        }

        $email = $sponsor->email;
        if ($request['email'] != $email) {
            $email = $request['email'];
        }

        $description = $sponsor->description;
        if ($request['description'] != $description) {
            $description = $request['description'];
        }

        $image = $sponsor->image;
        if ($request['image']) {
            Storage::disk('public')->delete($sponsor->image);
            $image = $this->createImage($request);
        }

       
        $expiration = $sponsor->expiration;
        if ($request['expiration'] != null) {
            $expiration = $request['expiration'];
        }

        $sponsor->update([
            'name'=>$name,
            'address_id'=>$address->id,
            'page'=>$page,
            'facebook'=>$facebook,
            'instagram'=>$instagram,
            'twitter'=>$twitter,
            'web'=>$web,
            'email'=>$email,
            'description'=>$description,
            'image'=>$image,
            'expiration'=>$expiration,
            'facebook_link' => $facebookLink,
            'instagram_link' => $instagramLink,
            'twitter_link' => $twitterLink,
        ]);

        return redirect()->route('sponsor.index')->with('notice', 'La publicdad ' . $sponsor->name . ' ha sido editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);
        Storage::disk('public')->delete($sponsor->image);
        $address = Address::find($sponsor->address->id);
        $sponsor->delete();
        $address->delete();
        return redirect()->route('sponsor.index')->with('notice', 'La publicidad de ' . $sponsor->name . ' ha sido eliminada correctamente.');

    }

    public function createImage(Request $request)
    {
        //$file = $request['image'];
        //$name = $request['name'] . "." . $file->extension();
        //$path = $file->storeAs('sponsors', $name, 'public');
        
        $file = $request['image'];
        $name = $request->input('name').".".$file->extension();
        $path = 'services/'.$name;
        move_uploaded_file($file, "../public_html/storage/$path");
        
        return $path;
    }

    public function createAddress(Request $request)
    {
        $address = Address::create([
            'street'=>$request['street'],
            'number'=>$request['number'],
            'locality_id'=>$request['locality']
        ]);
        return $address;
    }

    public function expirationCalculate()
    {
        $sponsors = Sponsor::all();
        foreach ($sponsors as $sponsor) {
            $expiration = new DateTime($sponsor->expiration);
            $date = new DateTime();
            if ($date->format('Y-m-d') > $expiration->format('Y-m-d')) {
                $sponsor->update([
                    'expirated'=>true,
                ]);
            }else{
                $sponsor->update([
                    'expirated' => false,
                ]);
            }
        }
        return redirect()->route('sponsor.index')->with('notice', 'Los vencimientos se actualizaron correctamente');

    }
}
