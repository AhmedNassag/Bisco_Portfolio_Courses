<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseItem = \App\Models\CourseItem::create([
            'name_ar'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'name_en'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'author_ar' => 'Rabie Elkheir',
            'author_en' => 'Rabie Elkheir',
            'photo'     => 'course-item-1.jpg',
        ]);
        
        $courseItem = \App\Models\CourseItem::create([
            'name_ar'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'name_en'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'author_ar' => 'Rabie Elkheir',
            'author_en' => 'Rabie Elkheir',
            'photo'     => 'course-item-2.jpg',
        ]);
        
        $courseItem = \App\Models\CourseItem::create([
            'name_ar'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'name_en'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'author_ar' => 'Rabie Elkheir',
            'author_en' => 'Rabie Elkheir',
            'photo'     => 'course-item-3.jpg',
        ]);

        $courseItem = \App\Models\CourseItem::create([
            'name_ar'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'name_en'   => 'Long Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, est....',
            'author_ar' => 'Rabie Elkheir',
            'author_en' => 'Rabie Elkheir',
            'photo'     => 'course-item-4.jpg',
        ]);
    }
}
