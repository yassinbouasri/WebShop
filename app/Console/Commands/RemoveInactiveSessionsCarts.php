<?php

namespace App\Console\Commands;

use App\Models\Cart;
use Illuminate\Console\Command;

class RemoveInactiveSessionsCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-inactive-sessions-carts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove carts from inactive sessions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $carts = Cart::whereDoesntHave('user')->whereDate('created_at', '<' ,now()->subDay(1))->get();

         foreach ($carts as $cart) {
             $cart->delete();
         }
    }
}
