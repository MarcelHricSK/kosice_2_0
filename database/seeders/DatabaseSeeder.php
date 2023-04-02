<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Language;
use App\Models\Offer;
use App\Models\OfferGroup;
use App\Models\OfferOption;
use App\Models\OfferPackage;
use App\Models\OfferProfile;
use App\Models\OfferRoom;
use App\Services\EncryptionService;
use App\Services\SettingsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    private function getData()
    {
        return [
            'administrators' => [
                [
                    'name' => 'Marcel Hric',
                    'email' => 'marcelkohric@gmail.com',
                    'password' => Hash::make('1234'),
                ]
            ],
        ];
    }

    public function run()
    {
        $data = $this->getData();

        foreach ($data['administrators'] as $raw) {
            Administrator::create($raw);
        }

        SettingsService::bootstrap();
    }
}
