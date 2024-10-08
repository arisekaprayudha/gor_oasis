<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            
            UserSeederTable::class,
            RoleSeederTable::class,
           
            RoleUserSeederTable::class,
            BobotSeederTable::class,
            NilaiSeederTable::class,
           
        ]);
    }
}