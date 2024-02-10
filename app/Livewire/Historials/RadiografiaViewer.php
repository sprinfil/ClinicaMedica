<?php

namespace App\Livewire\Historials;

use App\Models\Imagen;
use Livewire\Component;
use App\Models\Paciente;
use App\Models\Radiografia;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Request;
use Livewire\WithFileUploads;
use Livewire\Attributes\On; 

class RadiografiaViewer extends Component
{
    public $paciente_id;
    public $paciente;
    public $radiografias;
    public $radiografia;
    public $radiografiasTratamientos;

    use WithFileUploads;

    public $nombre;
    public $descripcion;
    public $imagen;
    public $modalOpen = false; 

    public function render()
    {        
        try {
            if ($this->paciente_id != null)
                $this->paciente = Paciente::findOrFail($this->paciente_id);
        } catch (\Throwable $th) {

        }

        if ($this->paciente){
            $this->radiografiasTratamientos = $this->obtenerRadiografiasDesdeImagenes();

            $this->radiografias = Radiografia::where('paciente_id', $this->paciente->id)->get();
        }

        return view('livewire.historials.radiografia');
    }


    public function obtenerRadiografiasDesdeImagenes(): array {
        try {
            $radiografias = [];
            $tratamientos = Tratamiento::where('paciente_id', $this->paciente->id)->get();
            
            if ($tratamientos){
                foreach ($tratamientos as $tratamiento){
                    $imagen = Imagen::where('tratamiento_id', $tratamiento->id)->where('tipo', 'radiografia')->first();
                    if ($imagen) {
                        $radiografias[] = $imagen;
                    }                }
            }

            return $radiografias;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function openModal(){
        $this->modalOpen = true;
    }

    public function saveRadiografia()
    {
        $this->validate([
            'nombre' => 'required|min:3', 
            'descripcion' => 'required|min:5', 
            'imagen' => 'required|image|max:10240', 
        ]);
        
        if ($this->imagen) {
            $path = $this->imagen->store('radiografias', 'public'); 
            
            $radiografia = new Radiografia([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'fecha' => now()->format('Y-m-d'),
                'path' => $path, 
                'paciente_id' => $this->paciente_id,
            ]);
            $radiografia->save();
            $this->dispatch('radiografia_save');
            
            $this->reset(['nombre', 'descripcion', 'imagen']);
            $this->modalOpen = false;

        }
    }

    public function eliminar($id){
        $this->radiografia = Radiografia::findOrFail($id);

        if($this->radiografia)
            $this->dispatch('eliminar_advertencia');
    }
    #[On('eliminar_radiografia')] 
    public function eliminar_radiografia(){
        $this->radiografia->delete();
    }
}
