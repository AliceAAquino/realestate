<?php

namespace App\Http\Controllers;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $property_type = PropertyType::all();
            return view('property_type.index', compact('property_type'));
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
            return view('property_type.create');
        }
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'type' => 'required|max:255',
        ]);
        PropertyType::create($request->all());
        return redirect()->route('property_type.index')
                ->withSuccess('New PropertyType is added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyType $property_type)
    {
        if(Auth::check())
        {
            return view('property_type.edit', [
                'property_type' => $property_type
            ]);

        }
            return redirect()->route('login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyType $property_type)
    {

        $request->validate([
          'type' => 'required|max:255',
        ]);
        
        $property_type->update($request->all());
        return redirect()->route('property_type.index')
                ->withSuccess('Property Type is updated successfully.');
    }
     /**
     * Display the specified resource.
     */
    public function show(PropertyType $property_type)
    {
        if(Auth::check())
        {
            return view('property_type.show', [
                'type' => $property_type
            ]);
        }
            return redirect()->route('login');

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyType $property_type)
    {
        $property_type->delete();
        return redirect()->route('property_type.index')
                ->withSuccess('Property Type is deleted successfully.');
    }
}
