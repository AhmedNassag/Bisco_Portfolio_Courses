<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyInformation = \App\Models\CompanyInformation::create([
            'name_ar'       => 'BioHealux',
            'name_en'       => 'BioHealux',
            'details_ar'    => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'details_en'    => 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'address_ar'    => '1105 Mansoura Dakahlia - Egypt',
            'address_en'    => '1105 Mansoura Dakahlia - Egypt',
            'phone'         => '0123456789',
            'mobile'        => '01016856433',
            'email'         => 'info@biohealux.com',
            'whatsapp'      => '01016856433',
            'facebook_url'  => 'https://www.facebook.com/',
            'youtube_url'   => 'https://www.youtube.com/',
            'linkedin_url'  => 'https://www.linkedin.com/',
            'twitter_url'   => 'https://www.twitter.com/',
            'instagram_url' => 'https://www.instagram.com/',
            'photo'         => 'company-information.png',
        ]);
    }
}
