<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            [
                'name' => 'Menu',
            ],
            [
                'name' => 'Pengguna',
            ],
        ];
  
        foreach ($links as $key => $item) {
            Settings::create($item);
        }
    }
}
