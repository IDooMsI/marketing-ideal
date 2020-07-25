<?php

namespace App\Http\Controllers;

use App\Service;
use App\Spec;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $vac = compact('services');
        return view('admin.service.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specs = Spec::all();
        $subcategories = DB::table('subcategories')->where('category_id',1)->get();
        $vac = compact('specs','subcategories');
        return view('admin.service.create',$vac);
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

        $service = Service::create([
            'name'          =>$request['name'],
            'price'         =>$request['price'],
            'description'   =>$request['description'],
            'image'         =>$image,
            'subcategory_id'   =>$request['subcategory']
        ]);

        if($request['specs']){
            foreach ($request['specs'] as $spec) {
                DB::table('service_specs')->insert(
                    ['service_id'=>$service->id, 'specs_id'=>$spec]
                );
            }
        }

        return redirect()->route('service.index')->with('notice', 'El servicio '. $request['name'] .' ha sido creado correctamente.');
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
        $service = Service::find($id);
        $specs = Spec::all();
        $subcategories = DB::table('subcategories')->where('category_id',1)->get();
        $vac = compact('service','specs','subcategories');
        return view('admin.service.edit', $vac);
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
        $service = Service::find($id);

        $name = $service->name;
        if (isset($request['name'])) {
            $name = $request['name'];
        }

        $price = $service->price;
        if (isset($request['price'])) {
            $price = $request['price'];
        }
        
        $description = $service->description;
        if (isset($request['description'])) {
            $description = $request['description'];
        }

        $image = $service->image;
        if (isset($request['image'])) {
            $image = $this->createImage($request);
        }
        
        $subcategory = $service->subcategory;
        if(isset($request['subcategory'])){
            $subcategory = $request['subcategory'];
        }

        $service->update([
            'name'          =>$name,
            'price'         =>$price,
            'description'   =>$description,
            'image'         =>$image,
            'subcategory_id'   =>$subcategory,
        ]);
        
        if ($request['specs']) {
            $entrantes = $request['specs'];
            
            $existentes = [];
            foreach ($service->specs as $spec) {
                $existentes[] = $spec->id;
            }

            $faltantesEntrantes = array_diff($entrantes, $existentes);
            if (count($faltantesEntrantes) >= 1) {
                foreach ($faltantesEntrantes as $new) {
                    DB::table('service_specs')->insert(
                        ['service_id' => $service->id, 'specs_id' => $new]
                    );        
                }
            }

            $faltantesSalientes = array_diff($existentes, $entrantes);
            if (count($faltantesSalientes) >= 1) {
                foreach ($faltantesSalientes as $old) {
                    DB::table('service_specs')->where([
                        ['service_id', $service->id],
                        ['specs_id', $old]

                    ])->delete();
                }
            }

        }else{
            DB::table('service_specs')->where('service_id',$service->id)->delete();
        }

        return redirect()->route('service.index')->with('notice', 'El servicio ' .$service->name. ' ha sido editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        Storage::disk('public')->delete($service->image);
        $service->delete();
        return redirect()->route('service.index')->with('notice', 'El servicio ' . $service->name . ' ha sido creado correctamente.');

    }

    public function validator(Request $request)
    {
        if(!$request['image']){
            $rules = [
                'image'=>'required'
            ];
            $message=[
                'required' => 'El campo es obligatorio.',
            ];
        }   
        $rules = [
            'name' => 'required|unique:services|string',
            'price' =>  'required|numeric',
            'description' =>  'required|string|max:500',
        ];
        $message = [
            'required' => 'El campo es obligatorio.',
            'unique' => 'El punto de venta ya existe en nuestra base.',
            'string' => 'Solo se admiten letras.',
            'numeric' => 'Solo se admiten numeros.',
            'max' => 'El campo debe tener menos de :max carateres.',
        ];
        return $this->validate($request, $rules, $message);
    }

    public function createImage(Request $request)
    {
        //$file = $request['image'];
        //$name = $request['name'] . "." . $file->extension();
        //$path = $file->storeAs('services', $name, 'public');
        
        $file = $request['image'];
        $name = $request->input('name').".".$file->extension();
        $path = 'services/'.$name;
        move_uploaded_file($file, "../public_html/storage/$path");
        
        return $path;
    }
}
