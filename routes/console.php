<?php

use App\Console\Commands\AbandonedCart;
use App\Console\Commands\RemoveInactiveSessionsCarts;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(AbandonedCart::class)->daily();
Schedule::command(RemoveInactiveSessionsCarts::class)->weekly();
