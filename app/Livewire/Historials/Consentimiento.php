<?php

namespace App\Livewire\Historials;

use Livewire\Component;
use App\Models\Contrato;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; 
use Illuminate\Support\Facades\Storage; 
use PDF; 
use Livewire\Attributes\On; 

class Consentimiento extends Component
{
    use WithFileUploads;

    public $paciente_id;
    public $paciente;
    public $consentimientoPath; 
    public $signatureImage;

    public function mount()
    {
        $this->paciente = Paciente::findOrFail($this->paciente_id);
    }

    public function render()
    {
        $this->consentimientoPath = 'contratos/consentimiento_'.$this->paciente_id.'.pdf';
        return view('livewire.historials.consentimiento');
    }

    public function saveConsentimiento()
    {
        try {
            //code...
            $image = $this->signatureImage; // Esto es la base64 de la imagen
            // dd($image);
            // Convierte la imagen base64 a archivo y guárdala en el storage
            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);
            $image = base64_decode($image);
            $imageName = 'firmas/'.time().'.png';
            Storage::disk('public')->put($imageName, $image);
    
            Storage::put($imageName, $image);
    
            $pdf = PDF::loadView('docs.pacientes.doc_consentimiento', ['paciente' => $this->paciente, 'firma' => $imageName]);
            $pdf->stream();
            $pdfPath = "contratos/consentimiento_{$this->paciente_id}.pdf";
            Storage::disk('public')->put($pdfPath, $pdf->output());
    
            $contrato = Contrato::firstOrNew(
                ['paciente_id' => $this->paciente_id],
                ['pdf' => $pdfPath, 'fecha' => now()]
            );
            
            $contrato->save();
    
            $timestamp = now()->timestamp;
    
            // Actualiza el path del consentimiento con el timestamp como parámetro de query
            $this->consentimientoPath = "contratos/consentimiento_{$this->paciente_id}.pdf?time={$timestamp}";
    
            $this->render();
            $this->dispatch('recargarIframe');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
