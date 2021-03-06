<?php

/**
 * Kernel.php
 * Copyright (c) 2018 thegrumpydictator@gmail.com
 *
 * This file is part of Firefly III.
 *
 * Firefly III is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Firefly III is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Firefly III. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;

/**
 * File to make sure commands work.
 *
 * @codeCoverageIgnore
 */
class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        /** @noinspection PhpIncludeInspection */
        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(
            function () {
                Log::error(
                    'Firefly III no longer users the Laravel scheduler to do cron jobs! Please read the instructions at https://firefly-iii.readthedocs.io/en/latest/'
                );
                echo "\n";
                echo '------------';
                echo "\n";
                echo wordwrap('Firefly III no longer users the Laravel scheduler to do cron jobs! Please read the instructions here:');
                echo "\n";
                echo 'https://firefly-iii.readthedocs.io/en/latest/';
                echo "\n\n";
                echo 'Disable this cron job!';
                echo "\n";
                echo '------------';
                echo "\n";
            }
        )->everyMinute();
    }
}
