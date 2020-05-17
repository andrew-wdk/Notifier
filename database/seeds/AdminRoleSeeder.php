<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;


class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@site.com')->first();
        $user->assignRole('super_admin');
    }
}
