<?php
use Illuminate\Database\Seeder;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomePageSections
 *
 * @author Gaurav Dhiman
 */
class HomePageSections extends Seeder
{
    public function run()
    {
        $records = [
            [
                'page_id' => '1',
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
                'page_id' => '1',
                'section_name' => 'section-2',
                'content' => '
                            <div class="mission_text">
								<h4>About Our Mission</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
							</div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
             [
                'page_id' => '1',
                'section_name' => 'section-3',
                'content' => '
                            <div class="mission_text">
                                <h4>Road to Success</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                            </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
             [
                'page_id' => '1',
                'section_name' => 'section-4',
                'content' => '
                            <div class="mission_text">
                                <h4>Road to Success</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>
                            </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_sections')->insert($records);
    }
    
}
