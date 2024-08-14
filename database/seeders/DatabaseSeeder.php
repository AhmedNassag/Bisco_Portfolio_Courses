<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);

        $this->call(CompanyInformationSeeder::class);
        $this->call(CourseItemSeeder::class);
        $this->call(PartenerSeeder::class);
        $this->call(ProjectDetailSeeder::class);
        $this->call(ProjectItemSeeder::class);
        $this->call(ServiceDetailSeeder::class);
        $this->call(ServiceItemSeeder::class);
        $this->call(SliderFooterSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(WhoWeAreDetailSeeder::class);
        $this->call(WhoWeAreFaqSeeder::class);
        $this->call(WhoWeAreSideSeeder::class);
    }
}
