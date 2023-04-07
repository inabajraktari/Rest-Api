<?php

namespace Database\Seeders;

use App\Models\Agents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agents::factory()
        ->count(25)
        ->hasShipments(10)
        ->create();

        Agents::factory()
        ->count(70)
        ->hasShipments(8)
        ->create();

        Agents::factory()
        ->count(100)
        ->hasShipments(15)
        ->create();

        Agents::factory()
        ->count(3)
        ->create();
    }
}
