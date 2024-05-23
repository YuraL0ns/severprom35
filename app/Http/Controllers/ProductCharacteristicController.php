<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCharacteristicRequest;
use App\Models\ProductCharacteristic;
use Illuminate\Http\Request;


class ProductCharacteristicController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characteristics = ProductCharacteristic::all();
        return view('characteristics.index', compact('characteristics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('characteristics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCharacteristicRequest $request)
    {
        ProductCharacteristic::create($request->validated());
        return redirect()->route('characteristics.index')->with('success', 'Characteristic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCharacteristic  $productCharacteristic
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCharacteristic $productCharacteristic)
    {
        return view('characteristics.show', compact('productCharacteristic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCharacteristic  $productCharacteristic
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCharacteristic $productCharacteristic)
    {
        return view('characteristics.edit', compact('productCharacteristic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCharacteristic  $productCharacteristic
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCharacteristicRequest $request, ProductCharacteristic $productCharacteristic)
    {
        $productCharacteristic->update($request->validated());
        return redirect()->route('characteristics.index')->with('success', 'Characteristic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCharacteristic  $productCharacteristic
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCharacteristic $productCharacteristic)
    {
        $productCharacteristic->delete();
        return redirect()->route('characteristics.index')->with('success', 'Characteristic deleted successfully.');
    }
}
