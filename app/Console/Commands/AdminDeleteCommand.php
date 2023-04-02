<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminDeleteCommand extends Command
{
    protected $signature = 'admin:delete';

    protected $description = 'Create app administrator';

    public function handle()
    {
        $id = $this->ask('ID');
        $admin = Administrator::find($id);
        if ($admin) {
            $admin->delete();
            $this->info('Administrator \'' . $admin->email . '\' deleted.');
        } else {
            $this->info('Administrator does not exist.');
        }
    }
}
