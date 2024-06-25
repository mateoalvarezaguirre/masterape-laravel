<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Src\Shared\Enums\RoleEnum;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            ['first_name' => 'Alan', 'last_name' => 'Moore'],
            ['first_name' => 'George', 'last_name' => 'Orwell'],
            ['first_name' => 'J.R.R.', 'last_name' => 'Tolkien'],
            ['first_name' => 'Jane', 'last_name' => 'Austen'],
            ['first_name' => 'Gabriel', 'last_name' => 'García Márquez'],
            ['first_name' => 'Harper', 'last_name' => 'Lee'],
            ['first_name' => 'Miguel', 'last_name' => 'de Cervantes'],
            ['first_name' => 'Fyodor', 'last_name' => 'Dostoevsky'],
            ['first_name' => 'F. Scott', 'last_name' => 'Fitzgerald'],
            ['first_name' => 'J.K.', 'last_name' => 'Rowling'],
            ['first_name' => 'Stephen', 'last_name' => 'King'],
            ['first_name' => 'Louisa May', 'last_name' => 'Alcott'],
        ];

        DB::table('authors')->insert($authors);
    }
}
