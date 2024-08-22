<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 3000) as $index) {
            $student_class = $faker->randomElement(['BA', 'BCOM', 'BCA', 'BSC', 'BBA', 'MA', 'MCA', 'MSC', 'MCOM', 'BTECH', 'MTECH']);
            DB::table('students')->insert([
                'student_name' => $faker->name,
                'class' => $student_class,
                'admission_date' => $faker->dateTimeThisYear(),
                'yearly_fees' => $faker->numberBetween(200000, 300000),
                'class_teacher_id' => Teacher::inRandomOrder()->first()->teacher_id,
            ]);
        }
    }
}
