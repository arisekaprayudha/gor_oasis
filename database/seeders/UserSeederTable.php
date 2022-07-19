<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeederTable extends Seeder
{
    public function run()
    {

        DB::table('hrmlmsusers')->insert([
            [
                'id'             => 1,
                'name'           => 'Naura Gena',
                'unitkerja_id'           => '1',
                'nip'          => '2201783406',
                'password'       => '$2y$10$he9HNjWJponZR0rYOYQdhefd0uRNVQwg0NRkLU8GbYUcYgr0acERi',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 2,
                'name'           => 'Aitisen',
                'unitkerja_id'           => '2',
                'nip'          => '2201749753',
                'password'       => '$2y$10$rfopfbtFn.yUxbMBwN6RjOEtoNGn6lyqxzppqM6WaJAEw/Z.MuwDW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 3,
                'name'           => 'Robert Hill',
                'unitkerja_id'           => '1',
                'nip'          => '1001001001',
                'password'       => '$2y$10$uC61RQQ5Lcswnp7MAbyPt.EyC.7vY7Jv1Gu7dr2FncwopIngcg.Xy',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 4,
                'name'           => 'Katrina Ellies',
                'unitkerja_id'           => '2',
                'nip'          => '2022021002',
                'password'       => '$2y$10$HHrQWE4nD2PxXXaYLoPNXuY8k2X4juV8kX8ZdGgmbpMC6Vpp7qVgW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 5,
                'name'           => 'David Philips',
                'unitkerja_id'           => '1',
                'nip'          => '0110110110',
                'password'       => '$2y$10$HHrQWE4nD2PxXXaYLoPNXuY8k2X4juV8kX8ZdGgmbpMC6Vpp7qVgW',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            [
                'id'             => 6,
                'name'           => 'Anna Partricia',
                'unitkerja_id'           => '2',
                'nip'          => '0210022022',
                'password'       => '$2y$10$uC61RQQ5Lcswnp7MAbyPt.EyC.7vY7Jv1Gu7dr2FncwopIngcg.Xy',
                'two_factor_secret'        => '',
                'two_factor_recovery_codes' => '',
                'remember_token' => '',
            ],
            // [
            //     'id'             => 7,
            //     'name'           => 'Anna Partricia',
            //     'unitkerja_id'           => '2',
            //     'nip'          => '0210022022',
            //     'password'       => '$2y$10$uC61RQQ5Lcswnp7MAbyPt.EyC.7vY7Jv1Gu7dr2FncwopIngcg.Xy',
            //     'two_factor_secret'        => '',
            //     'two_factor_recovery_codes' => '',
            //     'remember_token' => '',
            // ],
        ]
        );

    //     $user = [
    //     [
    //         'id'             => 1,
    //         'name'           => 'Naura Gena',
    //         'nip'          => 'mb21-002',
    //         'password'       => '$2y$10$GdubO8p..1F4Ic60m0e6Nu3H.0T5k6fhRmd3ozDuqaN.dBD83J9ue',
    //         'two_factor_secret'        => '',
    //         'two_factor_recovery_codes' => '',
    //         'remember_token' => '',
    //     ],
    //     [
    //         'id'             => 2,
    //         'name'           => 'Aitisen',
    //         'nip'          => 'mb21-001',
    //         'password'       => '$2y$10$GdubO8p..1F4Ic60m0e6Nu3H.0T5k6fhRmd3ozDuqaN.dBD83J9ue',
    //         'two_factor_secret'        => '',
    //         'two_factor_recovery_codes' => '',
    //         'remember_token' => '',
    //     ],    
    // ]
    //     DB::table('users')->insert($user);
    }
}