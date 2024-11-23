<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InitializeCartForUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Authenticated $event)
    {
        $user = $event->user;

        // Si el usuario no tiene un carrito, inicializarlo
        if (Cart::where('username', $user->id)->count() === 0) {
            // Aquí puedes inicializar un carrito vacío si lo necesitas
        }
    }
}
