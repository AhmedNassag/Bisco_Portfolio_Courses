<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceItem = \App\Models\ServiceItem::create([
            'name_ar'    => 'Medical Equipment',
            'name_en'    => 'Medical Equipment',
            'details_ar' => 'Ut elit tellus, luctus nec magna mattis et, pulvinar dapibus lorem leo ultricies et vitae enim',
            'details_en' => 'Ut elit tellus, luctus nec magna mattis et, pulvinar dapibus lorem leo ultricies et vitae enim',
            'photo'      => 'service-item-1.png',
        ]);

        $serviceItem = \App\Models\ServiceItem::create([
            'name_ar'    => 'Planning Consultation',
            'name_en'    => 'Planning Consultation',
            'details_ar' => 'Ut elit tellus, luctus nec magna mattis et, pulvinar dapibus lorem leo ultricies et vitae enim',
            'details_en' => 'Ut elit tellus, luctus nec magna mattis et, pulvinar dapibus lorem leo ultricies et vitae enim',
            'photo'      => 'service-item-2.webp',
        ]);

        $serviceItem = \App\Models\ServiceItem::create([
            'name_ar'    => 'Medical Equipment Supply',
            'name_en'    => 'Medical Equipment Supply',
            'details_ar' => 'Ut elit tellus, luctus nec magna mattis et, pulvinar dapibus lorem leo ultricies et vitae enim',
            'details_en' => 'Ut elit tellus, luctus nec magna mattis et, pulvinar dapibus lorem leo ultricies et vitae enim',
            'photo'      => 'service-item-3.png',
        ]);
    }
}
