<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            [
                //naura
                'user_id'             => 1,
                'role_id'           => 1
            ],
            [
                //aitisen
                'user_id'             => 2,
                'role_id'           => 1
            ],
            [
                'user_id'             => 3,
                'role_id'           => 2
            ],
            [
                'user_id'             => 4,
                'role_id'           => 2
            ],
            [
                'user_id'             => 5,
                'role_id'           => 2
            ],
            [
                'user_id'             => 6,
                'role_id'           => 2
            ],
        ]
        );
    }
}