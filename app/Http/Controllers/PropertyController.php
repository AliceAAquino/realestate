<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use App\Models\Location;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            // $properties = Properties::all();
            // return view('properties.index', compact('properties'));

            return view('property.index', [
            'property' => DB::table('property')
                ->join('category','property.cat_id','=','category.id')
                ->join('location','property.loc_id','=','location.id')
                ->join('property_type','property.type_id','=','property_type.id')
                ->select('property.*','category.category','location.location','property_type.type')
                ->paginate(50)
            ]);
        }
            return redirect()->route('login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if(Auth::check())
        {
            $data['category'] = Category::get(["category", "id"]);
            $data['location'] = Location::get(["location", "id"]);
            $data['type'] = PropertyType::get(["type", "id"]);
            return view('property.create', $data);
        }
            return redirect()->route('login');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'cat_id' => 'required|integer',
            'loc_id' => 'required|integer',
            'type_id' => 'required|integer',
            'price' => 'required|integer',
           
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/img/featured/'), $imageName);
        $property = new Property();
        $property->property_name = $request->property_name;
        $property->description = $request->description;
        $property->image = 'assets/img/featured/'.$imageName;
        $property->cat_id = $request->cat_id;
        $property->loc_id = $request->loc_id;
        $property->type_id = $request->type_id;
        $property->price = $request->price;

        $property->save();
        return redirect()->route('property.index')->with('success', 'Product created successfully.');
        // Property::create($request->all());
        // return redirect()->route('property.index')
        //         ->withSuccess('New Property is added successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
       $data['category'] = Category::get(["category", "id"]);
       $data['location'] = Location::get(["location", "id"]);
       $data['type'] = PropertyType::get(["type", "id"]);
        
        $data['cat_id'] = $property->cat_id;
        $data['loc_id'] = $property->loc_id;
        $data['type_id'] = $property->type_id;
        return view('property.edit', [
            'property' => $property
        ],$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $imageName = '';
        
        
        if ($request->has('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img/featured/'), $imageName);
            $property->image = 'assets/img/featured/'.$imageName;

        } else {
          $property->image = $property->image;
        }
        $postData = ['property_name' => $request->property_name, 'description' => $request->description, 'image' => $property->image, 'cat_id'=> $request->cat_id, 'loc_id'=> $request->loc_id, 'type_id'=> $request->type_id, 'price'=> $request->price];
        
        $property->update($postData);
        return redirect()->route('property.index')
                ->withSuccess('Property is updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        // return redirect()->back()
        //         ->withSuccess('Product is updated successfully.');
        return redirect()->route('property.index')
                ->withSuccess('Property is updated successfully.');
    }
}
