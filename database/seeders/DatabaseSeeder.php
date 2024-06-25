<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Shared\Enums\RoleEnum;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);

        User::factory()->create([
            'name'    => 'Admin User',
            'email'   => 'admin@masterape.com',
            'role_id' => RoleEnum::SUPER_ADMIN->value,
        ]);
    }
}
