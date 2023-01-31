<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Naujas', 'type' => 'order'],
            ['name' => 'Pateiktas', 'type' => 'order'],
            ['name' => 'Patvirtintas', 'type' => 'order'],
            ['name' => 'Atšauktas', 'type' => 'order'],
            ['name' => 'Atlikta', 'type' => 'order'],

            ['name' => 'Naujas', 'type' => 'payment'],
            ['name' => 'Pateiktas', 'type' => 'payment'],
            ['name' => 'Patvirtintas', 'type' => 'payment'],
            ['name' => 'Atšauktas', 'type' => 'payment'],
            ['name' => 'Atlikta', 'type' => 'payment'],

            ['name' => 'Aktyvus', 'type' => 'user'],
            ['name' => 'Neaktyvus', 'type' => 'user'],
            ['name' => 'Blokuotas', 'type' => 'user'],
            ['name' => 'Ištrintas', 'type' => 'user'],

            ['name' => 'Aktyvus', 'type' => 'product'],
            ['name' => 'Neaktyvus', 'type' => 'product'],
            ['name' => 'Ištrintas', 'type' => 'product'],

            ['name' => 'Aktyvi', 'type' => 'category'],
            ['name' => 'Neaktyvi', 'type' => 'category'],
            ['name' => 'Ištrinta', 'type' => 'category']
        ];

        foreach ($statuses as $status) {
            Status::updateOrCreate($status);
        }
    }
}
