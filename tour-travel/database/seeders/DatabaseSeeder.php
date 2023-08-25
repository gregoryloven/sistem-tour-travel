<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(DestinasiSeeder::class);
        $this->call(ObjekWisataSeeder::class);
        $this->call(LamaHariSeeder::class);
        $this->call(IncludeItemSeeder::class);
        $this->call(WhatBringSeeder::class);
        $this->call(GeneralTermSeeder::class);
    }
}
