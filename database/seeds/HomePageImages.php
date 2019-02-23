<?php
use Illuminate\Database\Seeder;

class HomePageImages extends Seeder
{
    
    public function run()
    {

        $records = [
            [
                'page_id' => '1',
                'image' => '2.jpg',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'page_id' => '1',
                'image' => '3.jpg',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'page_id' => '1',
                'image' => '4.jpg',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_images')->insert($records);
    }

}
