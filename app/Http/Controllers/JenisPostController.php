<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class JenisPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.types.index',[
            'types' => Type::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.types.create',[
            'types' => Type::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);

        Type::create($validatedData);
        return redirect('/dashboard/types')->with('success', 'New Category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view ('dashboard.types.edit',[
            'types'=> $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $rules = [
            'jenis' => 'required|max:255',
        ];


        if($request->slug != $type->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        Type::where('id', $type->id)->update($validatedData);
        return redirect('/dashboard/types')->with('success', 'New Type has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);
        return redirect('/dashboard/types')->with('success', 'Type has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Type::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
