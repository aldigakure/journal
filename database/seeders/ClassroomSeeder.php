<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;

class ClassroomSeeder extends Seeder
{
    public function run()
    {
        $grades = [10, 11, 12];
        $sections = ['A', 'B', 'C', 'D'];

        foreach ($grades as $grade) {
            foreach ($sections as $sec) {
                $name = "$grade$sec";
                ClassRoom::updateOrCreate(
                    ['name' => $name],
                    ['grade' => (string)$grade, 'student_count' => 0]
                );
            }
        }
    }
}
