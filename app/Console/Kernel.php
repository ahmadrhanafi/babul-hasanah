<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('kegiatan:generate')->dailyAt('01:00');