<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $location = Location::all();
            return view('Location.index', compact('location'));
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
            return view('location.create');
        }
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'location' => 'required|max:255',
        ]);
        Location::create($request->all());
        return redirect()->route('location.index')
                ->withSuccess('New Location is added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        if(Auth::check())
        {
            return view('location.edit', [
                'location' => $location
            ]);

        }
            return redirect()->route('login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {

        $request->validate([
          'location' => 'required|max:255',
        ]);
        
        $location->update($request->all());
        return redirect()->route('location.index')
                ->withSuccess('Location is updated successfully.');
    }

     /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        if(Auth::check())
        {
            return view('Location.show', [
                'Location' => $Location
            ]);
        }
            return redirect()->route('login');

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')
                ->withSuccess('Location is deleted successfully.');
    }
}
