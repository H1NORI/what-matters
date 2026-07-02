<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Event;
use App\Models\Memory;
use Database\Factories\MemoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()
            ->count(25)
            ->has(
                Memory::factory()
                    ->count(4)
                    ->hasFacts(3)
            )
            ->has(
                Event::factory()
                    ->count(4)
            )
            ->create();
    }
}
