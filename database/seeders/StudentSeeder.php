<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Support\Enums\GenderTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::insert([
            [
                "email" => "user@gmail.com",
                "password" => bcrypt("userpass"),
                "nim" => "2141765899",
                "name" => "user",
            ],
            [
                "email" => "arya@gmail.com",
                "password" => bcrypt("userpass"),
                "nim" => "2141765898",
                "name" => "Arya Lukman",
            ],
        ]);
    }
}
