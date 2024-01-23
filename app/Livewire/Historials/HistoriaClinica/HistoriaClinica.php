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

    public $gastricos;
    public $renales;
    public $artritis;
    public $epilepsia;
    public $cancer;

    public $atencion_medica = 'NO'; // Inicialización predeterminada
    public $porque_atencion_medica = '';
    public $toma_medicamento = 'NO';
    public $es_alergico_medicamento = 'NO'; // Inicialización predeterminada
    public $cual_medicamento_alergico = '';
    public $es_alergico_alimento = 'NO'; // Inicialización predeterminada
    public $cual_alimento_alergico = '';

    public function mount(){
        $this->paciente = Paciente::find($this->paciente_id);
        $this->historial = Historial::where('paciente_id', $this->paciente->id)->get()->first();


        if($this->historial){
            if($this->historial->Diabetes == 1)
                $this->diabetes = true;
            if($this->historial->Tuberculosis == 1)
                $this->tuberculosis = true;
            if($this->historial->Presion == 1)
                $this->presion = true;
            if($this->historial->Hepatitis == 1)
                $this->hepatitis = true;
            if($this->historial->Anemia == 1)
                $this->anemia = true;
            if($this->historial->Asma == 1)
                $this->asma = true;
            if($this->historial->Migrana == 1)
                $this->migrana = true;
            if($this->historial->Fuma == 1)
                $this->fuma = true;
            if($this->historial->Alcohol == 1)
                $this->alcohol = true;
            if($this->historial->Ejercicio == 1)
                $this->ejercicio = true;
            if($this->historial->gastricos == 1)
                $this->gastricos = true;
            if($this->historial->renales == 1)
                $this->renales = true;
            if($this->historial->artritis == 1)
                $this->artritis = true;
            if($this->historial->epilepsia == 1)
                $this->epilepsia = true;
            if($this->historial->cancer == 1)
                $this->cancer = true;
            if($this->historial->atencion_medica)
                $this->atencion_medica = $this->historial->atencion_medica;
            if($this->historial->porque_atencion_medica)
                $this->porque_atencion_medica = $this->historial->porque_atencion_medica;
            if($this->historial->toma_medicamento)
                $this->toma_medicamento = $this->historial->toma_medicamento;
            if($this->historial->es_alergico_medicamento)
                $this->es_alergico_medicamento = $this->historial->es_alergico_medicamento;
            if($this->historial->cual_medicamento_alergico)
                $this->cual_medicamento_alergico = $this->historial->cual_medicamento_alergico;
            if($this->historial->es_alergico_alimento)
                $this->es_alergico_alimento = $this->historial->es_alergico_alimento;
            if($this->historial->cual_alimento_alergico)
                $this->cual_alimento_alergico = $this->historial->cual_alimento_alergico;

            
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
            $this->gastricos = false;
            $this->renales = false;
            $this->artritis = false;
            $this->epilepsia = false;
            $this->cancer = false;
            $this->atencion_medica = 'NO';
            $this->porque_atencion_medica = '';
            $this->toma_medicamento = 'NO';
            $this->es_alergico_medicamento = 'NO';
            $this->cual_medicamento_alergico = '';
            $this->es_alergico_alimento = 'NO';
            $this->cual_alimento_alergico = '';
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
            $this->historial->gastricos = $this->gastricos;
            $this->historial->renales = $this->renales;
            $this->historial->artritis = $this->artritis;
            $this->historial->epilepsia = $this->epilepsia;
            $this->historial->cancer = $this->cancer;
            $this->historial->atencion_medica = $this->atencion_medica;
            if ($this->historial->atencion_medica == 'SI'){
                $this->historial->porque_atencion_medica = $this->porque_atencion_medica;
            } else {
                $this->historial->porque_atencion_medica = '';
            }
            $this->historial->toma_medicamento = $this->toma_medicamento;
            $this->historial->es_alergico_medicamento = $this->es_alergico_medicamento;
            if ($this->historial->es_alergico_medicamento == 'SI')
                $this->historial->cual_medicamento_alergico = $this->cual_medicamento_alergico;
            else {
                $this->historial->cual_medicamento_alergico = '';
            }
            if ($this->historial->es_alergico_alimento){
                $this->historial->es_alergico_alimento = $this->es_alergico_alimento;
            } else {
                $this->historial->es_alergico_alimento = '';
            }
            $this->historial->cual_alimento_alergico = $this->cual_alimento_alergico;
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
                'gastricos' => $this->gastricos,
                'renales' => $this->renales,
                'artritis' => $this->artritis,
                'epilepsia' => $this->epilepsia,
                'cancer' => $this->cancer,
                'atencion_medica' => $this->atencion_medica,
                'porque_atencion_medica' => $this->porque_atencion_medica,
                'toma_medicamento' => $this->toma_medicamento,
                'es_alergico_medicamento' => $this->es_alergico_medicamento,
                'cual_medicamento_alergico' => $this->cual_medicamento_alergico,
                'es_alergico_alimento' => $this->es_alergico_alimento,
                'cual_alimento_alergico' => $this->cual_alimento_alergico,
                'PDF' => null,
                'paciente_id' => $this->paciente->id,
            ]);
        }

        $this->dispatch('success');
    }

    public function aplicar_cambios(){
        $this->render();
    }

    public function volver(){
        return redirect()->route('historial_medico');
    }
}
