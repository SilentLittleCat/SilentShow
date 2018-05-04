<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AdminUser::firstOrCreate([
            'username' => 'admin'
        ], [
            'password' => bcrypt('123456')
        ]);
    }
}
