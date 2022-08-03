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
        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeederTable::class);
        // $this->call(RoleSeederTable::class);
        // $this->call(VenueSeederTable::class);
        // $this->call(PermissionSeederTable::class);
        // $this->call(CategorySeederTable::class);
        // $this->call(ProviderSeederTable::class);
        $this->call([
            //KlasifikasiSeederTable::class,
            UnitKerjaSeederTable::class,
            UserSeederTable::class,
            RoleSeederTable::class,
            PermissionSeederTable::class,
            RoleUserSeederTable::class,
            //IndexSeederTable::class,
        ]);
    }
}