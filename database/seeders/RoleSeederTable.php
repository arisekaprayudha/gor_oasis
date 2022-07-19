<?php
namespace Database\Seeders;

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeederTable extends Seeder
{
    public function run()
    {

        DB::table('hrmlmsroles')->insert([
            [
                'id'             => 1,
                'nameRole'           => 'Admin',
            ],
            [
                'id'             => 2,
                'nameRole'           => 'User',
            ],
            [
                'id'             => 3,
                'nameRole'           => 'Direksi',
            ],
        ]
        );
    }
}