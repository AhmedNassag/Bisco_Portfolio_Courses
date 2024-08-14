<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SliderFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliderFooter = \App\Models\SliderFooter::create([
            'name_ar'    => 'Medical Equipment',
            'name_en'    => 'Medical Equipment',
            'details_ar' => 'Lorem ipsum dolor, sit amet consectetur',
            'details_en' => 'Lorem ipsum dolor, sit amet consectetur',
            'photo'      => 'slider-footer-1.png',
        ]);
        
        $sliderFooter = \App\Models\SliderFooter::create([
            'name_ar'    => 'Planning Consultation',
            'name_en'    => 'Planning Consultation',
            'details_ar' => 'Lorem ipsum dolor, sit amet consectetur',
            'details_en' => 'Lorem ipsum dolor, sit amet consectetur',
            'photo'      => 'slider-footer-2.webp',
        ]);
        
        $sliderFooter = \App\Models\SliderFooter::create([
            'name_ar'    => 'Medical Equipment Supply',
            'name_en'    => 'Medical Equipment Supply',
            'details_ar' => 'Lorem ipsum dolor, sit amet consectetur',
            'details_en' => 'Lorem ipsum dolor, sit amet consectetur',
            'photo'      => 'slider-footer-3.png',
        ]);
    }
}
