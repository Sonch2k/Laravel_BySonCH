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
        $fake  = Faker\Factory::create();
        $limit = 10;

        for ($i = 0; $i < $limit; $i++){
            DB::table('news')->insert([
                'title' => $fake->name,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'email' => $fake->unique->email,
                'description' => $fake->sentence(15)
            ]);
        }
//        factory(\App\User::class, 100000)->create();
//        DB::table('users')->insert([
//            'name' => 'Chu Quang Anh',
//            'email' => 'ahihi@gmail.com',
//            'password' => Hash::make('123456'),
//        ]);
//        DB::table('users')->insert([
//            'name' => 'Nguyen Van Chien',
//            'email' => 'ok@gmail.com',
//            'password' => Hash::make('abc123'),
//        ]);
//        DB::table('users')->insert([
//            'name' => 'Chu Hoang Son',
//            'email' => 'sonchhe2k@gmail.com',
//            'password' => Hash::make('ahihidu2k'),
//        ]);
    }
}
