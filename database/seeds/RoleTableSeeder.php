<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
    	$role_employee->name = 'employee';
    	$role_employee->description = 'Пользователь';
    	$role_employee->save();

    	$role_manager = new Role();
    	$role_manager->name = 'admin';
    	$role_manager->description = 'Administrator';
    	$role_manager->save();

    	$role_manager = new Role();
    	$role_manager->name = 'guest';
    	$role_manager->description = 'Гость';
    	$role_manager->save();
    }
}
