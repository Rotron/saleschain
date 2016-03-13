<?php

namespace App\Http\Controllers;

use \App\Item;
use App\Http\Requests;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * AJAX
     * Search itmes 
     * @param  Request $request json
     * @return list           
     */
    public function search(Request $request)
    {
        $value = "%".$request['name']."%";
        // filter more (available)
        if ($request['cat'] != 0) {
            return Item::where('category_id', '=', $request['cat'])
                        ->where('name', 'like', $value)->get();        
        }
        return Item::where('name', 'like', $value)->get();
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
        $item =  $request['item'];  
        
        $newItem = Item::create([
            'name'        => $item['name'],
            'price'       => $item['price'],
            'qty'         => $item['qty'],
            'category_id' => $item['category_id'],
            'available'   => $item['available']
        ]);

        if ($newItem->save()){
            return response()->json(['success' => 200, 'id' => $newItem->id]);
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
        $item =  $request['item'];  
        
        $original = Item::findOrFail($item['id']);

        $original->name        = $item['name'];
        $original->qty         = $item['qty'];
        $original->price       = $item['price'];
        $original->category_id = $item['category_id'];
        $original->available   = $item['available'];

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
        Item::findOrFail($request['id'])->delete();

        return 1;
    }
}
