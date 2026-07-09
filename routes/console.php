<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('sitemap:generate')
    ->dailyAt('02:00');
