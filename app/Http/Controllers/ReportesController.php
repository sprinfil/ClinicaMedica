<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    //
    public function corte_caja_index(){
        return view('reportes.corte_caja.index');
    }
}
