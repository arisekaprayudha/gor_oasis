<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeederTable extends Seeder
{
    public function run()
    {

        DB::table('users')->insert([
            [
                'id'             => 1,
                'name'           => 'Admin',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 2,
                'name'           => 'Aris Eka Prayudha',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 3,
                'name'           => 'Dewi Puspita Sari',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 4,
                'name'           => 'Budi Hartono',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 5,
                'name'           => 'Muhammad Dimas',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 6,
                'name'           => 'Putri Dian',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 7,
                'name'           => 'Rafida Raudina',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 8,
                'name'           => 'Naura Gena',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            
            [
                'id'             => 9,
                'name'           => 'Teguh Purnomo',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 10,
                'name'           => 'Anisa Cantika',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 11,
                'name'           => 'Adam Prakoso',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 12,
                'name'           => 'Salsabila Yasmin',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 13,
                'name'           => 'Bayu Widyanto',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 14,
                'name'           => 'Nabila Putri',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 15,
                'name'           => 'Abdul Fajar',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 16,
                'name'           => 'Aditya Pradika',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
        ]
        );

    }
}