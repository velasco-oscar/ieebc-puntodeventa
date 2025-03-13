<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\Cliente;

class CreateClienteForRegisteredUser
{
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;

        
        if (!$user->cliente) {
            Cliente::create([
                'user_id' => $user->id,
                
                'nombre' => $user->name,
                
            ]);
        }
    }
}
