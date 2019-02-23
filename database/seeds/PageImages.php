<?php
use Illuminate\Database\Seeder;

class PageImages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_images')->truncate();

        $records = [
            [
                'page_id' => '2',
                'image' => '1.jpg',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_images')->insert($records);
    }

}