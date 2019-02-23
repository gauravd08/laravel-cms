<?php
use Illuminate\Database\Seeder;

class CompanyPageImages extends Seeder
{
    
    public function run()
    {

        $records = [
            [
                'page_id' => '3',
                'image' => '5.png',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_images')->insert($records);
    }

}
