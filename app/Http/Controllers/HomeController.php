<?php

namespace App\Http\Controllers;


use App\Models\Property;
use App\Models\Category;
use App\Models\Location;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['category'] = Category::get(["category", "id"]);
        $data['location'] = Location::get(["location", "id"]);
        $data['type'] = PropertyType::get(["type", "id"]);
        $data['property'] = Property::get(["property_name","image", "id"]);
        return view('layouts', $data);
    }
    public function search(Request $request)
    {
        var_dump('in');

        // $property = [];

        // if($request->has('cat_id')){
        //     $property = DB::table("property")
        //         ->where('cat_id',$request->cat_id)
        //         ->get();
        // }

        // return response()->json(['property' => $property]);

    }
}
