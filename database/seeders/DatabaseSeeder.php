<?php

namespace Database\Seeders;

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
        // Seeder User Admin
        User::factory()->create([
            'name'     => 'Admin Sekolah',
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        // Seeder User Operator
        User::factory()->create([
            'name'     => 'Operator Sekolah',
            'username' => 'operator',
            'email'    => 'operator@gmail.com',
            'password' => bcrypt('12345678'),
            'role'     => 'operator',
            'status' => 'aktif',
        ]);


       $this->call([
            ProfileSekolahSeeder::class,
            GuruSeeder::class,
            SiswaSeeder::class,
            BeritaSeeder::class,
            EkstrakurikulerSeeder::class,
            JurusanSeeder::class,
            PrestasiSeeder::class,
            GaleriSeeder::class,
    ]);

    }
}
