<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Pawanwit',
                'lastname' => 'Suvadhanabhakdi',
                'nickname' => 'Cing',
                'email' => 'pawanwit.s@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => '$2y$10$uHGqtezeAOYUnDKwZTT3peEU3YyqWZsT/0vgOTVr6JKjhv9RZ0SEu',
                'birthdate' => '1988-03-06',
                'gender' => 'male',
                'type' => 'Student',
                'remember_token' => '1234',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'firstname' => 'Skill',
                'lastname' => 'Lane',
                'nickname' => 'Keng',
                'email' => 'skillLane@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => '$2y$10$uHGqtezeAOYUnDKwZTT3peEU3YyqWZsT/0vgOTVr6JKjhv9RZ0SEu',
                'birthdate' => '1988-03-06',
                'gender' => 'male',
                'type' => 'Instructor',
                'remember_token' => '1234',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'firstname' => 'Jantaras',
                'lastname' => 'Suvadhanabhakdi',
                'nickname' => 'Lunar',
                'email' => 'jantaras.s@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => '$2y$10$uHGqtezeAOYUnDKwZTT3peEU3YyqWZsT/0vgOTVr6JKjhv9RZ0SEu',
                'birthdate' => '1988-03-06',
                'gender' => 'female',
                'type' => 'Instructor',
                'remember_token' => '1234',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
