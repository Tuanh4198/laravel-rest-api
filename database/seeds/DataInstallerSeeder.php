<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataInstallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('data_installer')->insert([
            'installer_name' => 'ha manh',
            'installer_phone' => '43267635235',
            'installer_email' => 'hamanh@gmail.com',
            'installer_adr_1' => 'ha noi',
            'installer_adr_2' => 'ha noi',
            'installer_city' => 'ha noi',
            'installer_state' => 'ha noi',
            'installer_pincode' => 90420,
            'installer_number_of_project' => '100',
            'installer_total_installer' => '100',
            'installer_maximum_installer' => '100',
            'installer_number_of_employees' => '100',
            'installer_maximum_distance' => '100',
        ]);
    }
}
