<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        $vac = compact('jobs');
        return view('admin.job.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        $vac = compact('jobs');
        return view('admin.job.create', $vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        $image = $this->createImage($request);

        Job::create([
            'title'  => $request['title'],
            'link' => $request['link'],
            'description' => $request['description'],
            'image' => $image,
        ]);

        return redirect()->route('job.index')->with('notice', 'El trabajo ' . $request['title'] . ' ha sido creado correctamente.');
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
        $job = Job::find($id);
        $vac = compact('job');
        return view('admin.job.edit', $vac);
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
        $job = Job::find($id);

        $title = $job->title;
        if (isset($request['title'])) {
            $title = $request['title'];
        }

        $link = $job->link;
        if (isset($request['link'])) {
            $link = $request['link'];
        }

        $description = $job->description;
        if (isset($request['description'])) {
            $description = $request['description'];
        }

        $image = $job->image;
        if (isset($request['image'])) {
            $image = $this->createImage($request);
        }

        $job->update([
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'image' => $image,
        ]);

        return redirect()->route('job.index')->with('notice', 'El trabajo ' . $job->name . ' ha sido editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        Storage::disk('public')->delete($job->image);
        $job->delete();
        return redirect()->route('job.index')->with('notice', 'El servicio ' . $job->name . ' ha sido creado correctamente.');

    }

    public function validator(Request $request)
    {
        if (!$request['image']) {
            $rules = [
                'image' => 'required'
            ];
            $message = [
                'required' => 'El campo es obligatorio.',
            ];
        }
        $rules = [
            'title' => 'required|unique:jobs|string',
            'link' =>  'required|string',
            'description' =>  'required|string|max:500',
        ];
        $message = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'El punto de venta ya existe en nuestra base.',
            'string' => 'Solo se admiten letras.',
            'max' => 'El campo debe tener menos de :max carateres.',
        ];
        return $this->validate($request, $rules, $message);
    }

    public function createImage(Request $request)
    {
        $file = $request['image'];
        $name = $request['title'] . "." . $file->extension();
        $path = $file->storeAs('jobs', $name, 'public');
        return $path;
    }
}
