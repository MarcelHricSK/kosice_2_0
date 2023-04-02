<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminListCommand extends Command
{
    protected $signature = 'admin:list';

    protected $description = 'List app administrators';

    public function handle()
    {
        $admins = Administrator::all(['id', 'name', 'email', 'created_at']);
        $this->table(['id', 'name', 'email', 'created_at'], $admins);
    }
}
