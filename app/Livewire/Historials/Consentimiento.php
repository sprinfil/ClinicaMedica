<?php

namespace App\Livewire\Historials;

use Livewire\Component;
use App\Models\Contrato;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; 
use Illuminate\Support\Facades\Storage; 
use PDF; 
use Illuminate\Support\Facades\File;
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
        $contrato = Contrato::where('paciente_id', $this->paciente_id)->orderBy('id', 'desc')->get()->first();
        if($contrato)
            $this->consentimientoPath = $contrato->pdf;

        return view('livewire.historials.consentimiento');
    }

    public function saveConsentimiento()
    {
        try {
            $image = $this->signatureImage;
            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);
            $image = base64_decode($image);

            $imageName = 'firmas/'.$this->paciente_id.'.png';
            Storage::disk('public')->put($imageName, $image);  

            $pdf = PDF::loadView('docs.pacientes.doc_consentimiento', ['paciente' => $this->paciente, 'firma' => $imageName]);
            $pdfPath = "contratos/consentimiento_". now()->format('dmY') . "_{$this->paciente_id}.pdf";
            Storage::disk('public')->put($pdfPath, $pdf->output());
    
            $contrato = Contrato::firstOrNew(
                ['paciente_id' => $this->paciente_id],
                ['pdf' => $pdfPath, 'fecha' => now()]
            );
            
            $contrato->save();
        
            $this->consentimientoPath = $contrato->pdf;
    
            $this->render();
            $this->dispatch('recargarIframe', ['paciente_id' => json_encode($this->paciente_id)]);
        } catch (\Throwable $th) {
        }
    }
}
