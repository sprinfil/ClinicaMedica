<?php

namespace App\Livewire\Historials\HistoriaClinica;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\Historial;

class HistoriaClinica extends Component
{
    public $paciente_id;
    public $paciente;
    public $historial;

    //antecedentes
    public $diabetes;
    public $tuberculosis;
    public $presion;
    public $hepatitis;
    public $anemia;
    public $asma;
    public $neumonia;
    public $migrana;

    //salud general
    public $fuma;
    public $alcohol;
    public $ejercicio;

    public function mount(){
        $this->paciente = Paciente::find($this->paciente_id);
        $this->historial = Historial::where('paciente_id', $this->paciente->id)->get()->first();
        
        if($this->historial){
            if($this->historial->Diabetes === 1)
                $this->diabetes = true;
            if($this->historial->Tuberculosis === 1)
                $this->tuberculosis = true;
            if($this->historial->Presion === 1)
                $this->presion = true;
            if($this->historial->Hepatitis === 1)
                $this->hepatitis = true;
            if($this->historial->Anemia === 1)
                $this->anemia = true;
            if($this->historial->Asma === 1)
                $this->asma = true;
            if($this->historial->Migrana === 1)
                $this->migrana = true;
            if($this->historial->Fuma === 1)
                $this->fuma = true;
            if($this->historial->Alcohol === 1)
                $this->alcohol = true;
            if($this->historial->Ejercicio === 1)
                $this->ejercicio = true;
            
        }else{
            $this->diabetes = false;
            $this->tuberculosis = false;
            $this->presion = false;
            $this->hepatitis = false;
            $this->anemia = false;
            $this->asma = false;
            $this->migrana = false;
            $this->fuma = false;
            $this->alcohol = false;
            $this->ejercicio = false;
        }
    }

    public function render()
    {
        return view('livewire.historials.historia-clinica.historia-clinica');
    }

    public function pdf(){
        dd('pdf...');
    }

    public function guardar(){
        // dd($this->historial);
        if($this->historial){
            $this->historial->Diabetes = $this->diabetes;
            $this->historial->Tuberculosis = $this->tuberculosis;
            $this->historial->Presion = $this->presion;
            $this->historial->Hepatitis = $this->hepatitis;
            $this->historial->Anemia = $this->anemia;
            $this->historial->Asma = $this->asma;
            $this->historial->Neumonia = $this->neumonia;
            $this->historial->Migrana = $this->migrana;
            $this->historial->Fuma = $this->fuma;
            $this->historial->Alcohol = $this->alcohol;
            $this->historial->Ejercicio = $this->ejercicio;
            $this->historial->save();
        }else{
            Historial::create([
                'Diabetes' => $this->diabetes,
                'Tuberculosis' => $this->tuberculosis,
                'Presion' => $this->presion,
                'Hepatitis' => $this->hepatitis,
                'Anemia' => $this->anemia,
                'Asma' => $this->asma,
                'Neumonia' => $this->neumonia,
                'Migrana' => $this->migrana,
                'Fuma' => $this->fuma,
                'Alcohol' => $this->alcohol,
                'Ejercicio' => $this->ejercicio,
                'PDF' => null,
                'paciente_id' => $this->paciente->id,
            ]);
        }

        $this->dispatch('success');
    }

    public function volver(){
        return redirect()->route('historial_medico');
    }
}
