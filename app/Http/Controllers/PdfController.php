<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use DateTime;
use Dompdf\Dompdf;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    //
    public function informacion_historia_clinica_paciente_pdf(Request $request){

        $paciente = Paciente::find(intval($request->paciente_id));

        if ($paciente != null) {

            $historia_clinica = Historial::where('paciente_id', $paciente->id)->first();
    
            if ($historia_clinica != null) {
                $pdf = PDF::loadView('docs.pacientes.doc_historia_clinica', [
                    'paciente' => $paciente, 
                    'historia_clinica' => $historia_clinica
                ]);
    
                // Aquí se asigna el nombre al archivo PDF
                $nombreArchivo = 'Historia_Clinica_' . $paciente->nombre . '_' . $paciente->apellido_1 . '_' . date('dmY') . '.pdf';
                return $pdf->download($nombreArchivo);
                
            } else {
                return redirect(route('historia-clinica'));
            }
        } else {
            return redirect(route('historia-clinica'));
        }
    }
}
