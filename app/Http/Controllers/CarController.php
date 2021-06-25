<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cars = Car::latest()->paginate(5);

        return view('Cars.index', compact('Cars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'fuel_type' => 'required',
            'fuel_tank_capacity' => 'required',
            'max_speed' => 'required',
            'price' => 'required'
        ]);

        Car::create($request->all());

        return redirect()->route('Cars.index')
            ->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $Car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $Car)
    {
        return view('Cars.show', compact('Car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $Car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $Car)
    {
        return view('Cars.edit', compact('Car'));
    }

        /**
     * Show the form for updating the price.
     *
     * @param  \App\Models\Car  $Car
     * @return \Illuminate\Http\Response
     */
    public function editPrice(Car $Car)
    {
        return view('Cars.editPrice', compact('Car'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $Car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $Car)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'fuel_type' => 'required',
            'fuel_tank_capacity' => 'required',
            'max_speed' => 'required',
            'price' => 'required'
        ]);
        $Car->update($request->all());

        return redirect()->route('Cars.index')
            ->with('success', 'Car updated successfully');
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $Car
     * @return \Illuminate\Http\Response
     */
    public function updatePrice(Request $request, Car $Car)
    {
        $request->validate([
            'price' => 'required'
        ]);
        $Car->update($request->all());

        return redirect()->route('Cars.index')
            ->with('success', 'Car updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $Car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $Car)
    {
        $Car->delete();

        return redirect()->route('Cars.index')
            ->with('success', 'Car deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $orderBy = $request->get('sort');

        if($request->filled('sort')){
            $Cars = DB::table('cars')->where('brand', 'like', '%'.$search.'%')
        ->orwhere('model', 'like', '%'.$search.'%')
        ->orwhere('description', 'like', '%'.$search.'%')->orderBy($orderBy, 'asc')->paginate(5);
        return view('Cars.index',['Cars' => $Cars]);
        }
        $Cars = DB::table('cars')->where('brand', 'like', '%'.$search.'%')
        ->orwhere('model', 'like', '%'.$search.'%')
        ->orwhere('description', 'like', '%'.$search.'%')->paginate(3);
        return view('Cars.index',['Cars' => $Cars]);
    }
    public function filter(Request $request)
    {
        $transmission = $request->get('transmission');
        $fuel_type = $request->get('fuel_type');

        if($request->filled('transmission') && $request->filled('fuel_type')){
            $Cars = DB::table('cars')->where('transmission', 'like', '%'.$transmission.'%')->where('fuel_type', 'like', '%'.$fuel_type.'%')->paginate(5);
            return view('Cars.index',['Cars' => $Cars]);
        }

        if($request->filled('fuel_type')){
            $Cars = DB::table('cars')->where('fuel_type', 'like', '%'.$fuel_type.'%')->paginate(5);
            return view('Cars.index',['Cars' => $Cars]);
        }

        if($request->filled('transmission')){
            $Cars = DB::table('cars')->where('transmission', 'like', '%'.$transmission.'%')->paginate(5);
            return view('Cars.index',['Cars' => $Cars]);
        }


        $Cars = DB::table('cars')->paginate(5);
        return view('Cars.index',['Cars' => $Cars]);
    }
}
