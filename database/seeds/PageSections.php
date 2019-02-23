<?php
use Illuminate\Database\Seeder;

class PageSections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_sections')->truncate();

        $records = [
            [
                'page_id' => '2',
                'section_name' => 'section-1',
                'content' => '
                            <div class="mission_text">
                                <h4>Road to Success</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                             </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'page_id' => '2',
                'section_name' => 'section-2',
                'content' => '
                            <div class="mission_text">
								<h4>About Our Mission</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
							</div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_sections')->insert($records);
    }

}