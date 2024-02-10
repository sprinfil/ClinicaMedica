<?php

namespace App\Http\Controllers;

use App\Models\Radiografia;
use Illuminate\Http\Request;

class RadiografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($paciente_id)
    {        //
        return view('historials.radiografia', ['paciente_id' => $paciente_id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Radiografia $radiografia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Radiografia $radiografia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Radiografia $radiografia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Radiografia $radiografia)
    {
        //
    }
}
