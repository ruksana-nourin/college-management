<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::factory()->createMany([
            ['name' => 'Admin'],
            ['name' => 'Teacher'],
            ['name' => 'Student'],
            ['name' => 'Accountant'],
            ['name' => 'Librarian'],
            ['name' => 'Staff'],
        ]);
        $this->call([
        // DepartmentSeeder::class,
        // CourseSeeder::class,
        // AcademicClassSeeder::class,
        // SectionSeeder::class,
        GroupSeeder::class
    ]);
    }
}
