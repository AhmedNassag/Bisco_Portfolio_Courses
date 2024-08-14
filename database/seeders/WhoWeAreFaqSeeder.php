<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WhoWeAreFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whoWeAre = \App\Models\WhoWeAreFaq::create([
            'name_ar'    => 'Why Us?',
            'name_en'    => 'Why Us?',
            'details_ar' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
            'details_en' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
        ]);
        
        $whoWeAre = \App\Models\WhoWeAreFaq::create([
            'name_ar'    => 'Explore Our Service',
            'name_en'    => 'Explore Our Service',
            'details_ar' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
            'details_en' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
        ]);
    }
}
