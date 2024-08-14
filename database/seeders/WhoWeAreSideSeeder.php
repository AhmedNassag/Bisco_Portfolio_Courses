<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WhoWeAreSideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whoWeAreSide = \App\Models\WhoWeAreSide::create([
            'name_ar'    => 'BIOHEALUX',
            'name_en'    => 'BIOHEALUX',
            'details_ar' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'details_en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'photo'      => 'who-we-are-side-1.jpg',
        ]);
        
        $whoWeAreSide = \App\Models\WhoWeAreSide::create([
            'name_ar'    => 'BIOHEALUX',
            'name_en'    => 'BIOHEALUX',
            'details_ar' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'details_en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'photo'      => 'who-we-are-side-1.jpg',
        ]);
    }
}
