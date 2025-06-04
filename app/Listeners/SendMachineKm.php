<?php

namespace App\Listeners;

use App\Events\MachineKmEvent;
use App\Mail\MachineKmMail;
use Illuminate\Support\Facades\Log;
use App\Models\Machine;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\MachineProjects;
use App\Models\Parameters;

class SendMachineKm
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {        
        //Log::info("Finalizaste el trabajo de la maquina correctamente: ");
    
    }
    
    public function handle(MachineKmEvent $event)
    {

        $machine = $event->machine;
        $addedKm = $event->addedKm;

        $beforeKm = $machine->kilometers;
        $afterKm = $beforeKm + $addedKm;

        $parametros = Parameters::first();
        $valor = $parametros->value;

        $beforeValue = intdiv($beforeKm, $valor);
        $afterValue = intdiv($afterKm, $valor);

        if ($afterValue > $beforeValue) {
            $machine->update([
                'kilometers' => $afterKm,
            ]);
            Mail::raw(
                "La máquina con número de serie {$machine->serial_number} ha alcanzado los {$machine->kilometers} km.",
                    function ($message) {
                        $message->to('smtp@mailtrap.com')
                        ->subject('Alerta de Kilometraje de Máquina');
                    }
            );
        }
    }
}
