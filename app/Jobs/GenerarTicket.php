<?php

namespace App\Jobs;

use App\Models\Paciente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class GenerarTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $paciente_id;
    public $tratamiento_id;
    public function __construct($paciente_id, $tratamiento_id)
    {
        //
        $this->tratamiento_id = $tratamiento_id;
        $this->paciente_id = $paciente_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        redirect(route('generar_ticket_venta',['paciente_id' => $this->paciente_id, 'tratamiento_id' => $this->tratamiento_id]));
    }
}
