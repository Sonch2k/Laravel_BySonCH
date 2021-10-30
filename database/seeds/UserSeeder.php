<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Chu Quang Anh',
            'email' => 'ahihi@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyen Van Chien',
            'email' => 'ok@gmail.com',
            'password' => Hash::make('abc123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Chu Hoang Son',
            'email' => 'sonchhe2k@gmail.com',
            'password' => Hash::make('ahihidu2k'),
        ]);
    }
}
