<?php

namespace Database\Factories;

use App\Models\Agents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipments>
 */
class ShipmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this ->faker->randomElement(['Land', 'Air', 'Sea']);
        $status = $this->faker->randomElement(['Pending', 'In transit', 'Delivered']);

        return [
            'agents_id'=> Agents::factory(),
            'type' => $type,
            'status' => $status,
        ];
    }
}
