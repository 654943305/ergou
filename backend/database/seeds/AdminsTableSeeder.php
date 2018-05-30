<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name' => 'wmhello',
            'email' => '871228582@qq.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'avatar' => 'uploads/201711251441th5a19812148058.jpg',
            'remember_token' => str_random(10),
        ]);

        DB::table('admins')->insert([
            'name' => 'dongdong',
            'email' => '786270744@qq.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
            'avatar' => 'uploads/201711251509th5a19879c71868.jpg',
            'remember_token' => str_random(10),
        ]);

        DB::table('admins')->insert([
            'name' => 'ergou',
            'email' => '654943305@qq.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
            'avatar' => 'uploads/201711251509th5a19879c71868.jpg',
            'remember_token' => str_random(10),
        ]);
    }
}
