<?php

namespace ckissi\tabler\Commands;

use Illuminate\Auth\Console\AuthMakeCommand;

class TablerCommand extends AuthMakeCommand
{
    protected $signature = 'make:tabler {--views : Only scaffold the authentication views}{--force : Overwrite existing views by default}';
    protected $description = 'Scaffold basic Tabler login and registration views and routes';
    protected $adminLteViews = [
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
        'auth/passwords/email.stub' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'auth/passwords/reset.blade.php',
        'home.stub' => 'home.blade.php',
    ];

    protected function exportViews()
    {
        parent::exportViews();
        foreach ($this->adminLteViews as $key => $value) {
            copy(__DIR__ . '/stubs/make/views/' . $key, base_path('resources/views/' . $value));
        }
    }
}