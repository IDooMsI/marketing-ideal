<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        $vac = compact('subcategories');
        return view('admin.subcategory.index', $vac);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $vac = compact('categories');
        return view('admin.subcategory.create',$vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subcategory::create([
            'name'  => $request['name'],
            'category_id'=>$request['category'],
        ]);

        return redirect()->route('subcategory.index')->with('notice', 'La subcategoria ' . $request['name'] . ' ha sido creado correctamente.');
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
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        $vac = compact('subcategory', 'categories');
        return view('admin.subcategory.edit', $vac);
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
        $subcategory = Subcategory::find($id);

        $name = $subcategory->name;
        if (isset($request['name'])) {
            $name = $request['name'];
        }
        $category = $subcategory->category_id;
        if(isset($request['category'])){
            $category = $request['category'];
        }

        $subcategory->update([
            'name' => $name,
            'category_id'=>$category,
        ]);

        return redirect()->route('subcategory.index')->with('notice', 'La subcategoria ' . $subcategory->name . ' ha sido editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
