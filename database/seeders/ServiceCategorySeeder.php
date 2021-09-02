<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert(

            [
            'name' => 'Beauty',
            'slug' => 'beauty',
            'image' => '1521969358.png'
            ],
            [
            'name' => 'Plumbing',
            'slug' => 'plumbing',
            'image' => '1521969409.png'
            ],
            [
            'name' => 'Garments',
            'slug' => 'garments',
            'image' => '1521972624.png'
            ]
        );
    }
}
