<?php

namespace App\Http\Controllers;

use DateTime;
use Dompdf\Dompdf;
use App\Models\Contrato;
use App\Models\Paciente;
use App\Models\Historial;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetalleTratamiento;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
                return redirect(route('historia-clinica',['paciente_id'=>$paciente->id]));
            }
        } else {
            return redirect(route('historia-clinica',['paciente_id'=>$paciente->id]));
        }
    }

    public function generar_ticket_venta(Request $request){
        $tratamiento = Tratamiento::find($request->tratamiento_id);
        $paciente = Paciente::find($request->paciente_id);
        $detalles = DetalleTratamiento::where('tratamiento_id',$tratamiento->id)->get();

        $pdf = PDF::loadView('docs.pacientes.doc_ticket',['paciente'=>$paciente, 'tratamiento'=>$tratamiento,'detalles'=>$detalles]);
        $nombreArchivo = 'TICKET_' . $paciente->nombre . '_' . $paciente->apellido_1 . '_' . date('dmYhis') . '.pdf';

        // Rutas para el almacenamiento
        $rutaBase = storage_path('app/public/tickets/');
        $rutaPaciente = $rutaBase . $paciente->id . '/';
        $rutaTratamiento = $rutaPaciente . $tratamiento->id . '/';
        $rutaCompleta = $rutaTratamiento . $nombreArchivo;

                // Crear directorios si no existen
        File::makeDirectory($rutaBase, 0775, true, true);
        File::makeDirectory($rutaPaciente, 0775, true, true);
        File::makeDirectory($rutaTratamiento, 0775, true, true);

        $pdf->save($rutaCompleta);
        $tratamiento->ticket = $nombreArchivo;
        $tratamiento->save();

        return $pdf->download($nombreArchivo);
        //return $pdf->download('hola.pdf');
        //return redirect(route('historia_odontologica_imagen',['paciente_id' => $request->paciente_id,'tratamiento_id' => $request->tratamiento_id]));
    }

    public function verpdf($paciente_id)
    {
        try {
            $contrato = Contrato::where('paciente_id', $paciente_id)->get()->first();
            if($contrato)
                $pdfPath = $contrato->pdf;
    
            if (Storage::disk('public')->exists($pdfPath)) 
            {   
                return response()->file(Storage::disk('public')->path($pdfPath));
            }
    
        } catch (\Throwable $th) {
            abort(404, 'El archivo PDF no se encontró.');
        }
    }
}
