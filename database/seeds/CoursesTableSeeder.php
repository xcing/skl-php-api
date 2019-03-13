<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'เขียน php ได้ใน 7วัน',
                'description' => 'สอนการเขียนเว็บไซต์ด้วยภาษา php โดยใช้ framework laravel',
                'category_id' => 1,
                'subject' => 'เขียน php ได้ใน 7วัน',
                'start_time' => '2019-06-05 13:00:00',
                'end_time' => '2019-06-05 17:00:00',
                'number_of_student' => 3,
                'instructor_user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'เขียน react ได้ใน 7วัน',
                'description' => 'สอนการเขียนเว็บไซต์ด้วยภาษา node js โดยใช้ framework react',
                'category_id' => 1,
                'subject' => 'เขียน react ได้ใน 7วัน',
                'start_time' => '2019-06-06 9:00:00',
                'end_time' => '2019-06-06 12:00:00',
                'number_of_student' => 1,
                'instructor_user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'สอนการทำบัญชี',
                'description' => 'สอนการทำบัญชีโดยใช้ SAP',
                'category_id' => 2,
                'subject' => 'สอนการทำบัญชี',
                'start_time' => '2019-07-05 13:00:00',
                'end_time' => '2019-07-05 17:00:00',
                'number_of_student' => 10,
                'instructor_user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
