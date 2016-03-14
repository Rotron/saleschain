<?php

namespace App\Http\Controllers;

use \App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'getCats']);
    }

    /**
     * View
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories');
    }

    public function show(Category $cat)
    {
        // return $cat->items;
        return view('backend.items')
                    ->with('cat', $cat)
                    ->with('items', $cat->items);
    }

    /**
     * AJAX
     * Return list of resources
     * @return App\Category 
     */
    public function getCats()
    {
        return Category::all();
    }

    /**
     * AJAX
     * Create new instance
     * @param  \Illuminate\Http\Request  $request
     * @param  int 
     * @return json
     */
    public function create(Request $request)
    {
        $cat =  $request['cat'];  
        $newCat = Category::create([
            'name' => $cat['name'],
            'available' => $cat['available']
        ]);

        if ($newCat->save()) {
            return response()->json(['success' => 200, 'id' => $newCat->id]);
        }
        return 0;
    }

    /**
     * AJAX
     * Update existing instance
     * @param  Request $request 
     * @return json      
     */
    public function update(Request $request)
    {
        $cat =  $request['cat'];  
        
        $original = Category::findOrFail($cat['id']);

        $original->name      = $cat['name'];
        $original->available = $cat['available'];

        if ($original->save()) {
            return 1;
        } 
        return 0;
    }

    /**
     * AJAX
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        Category::findOrFail($request['id'])->delete();

        return 1;
    }


}
