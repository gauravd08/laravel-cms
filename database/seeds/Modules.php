<?php
use Illuminate\Database\Seeder;

class Modules extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $records = [
            [
                'name' => 'Home Menus',
                'content' => '
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/company/">Company</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/about/">About</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/testimonial">Testimonial</a></li>
                            <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="/faq">FAQ</a></li>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'name' => 'Footer About',
                'content' => '
                            <div class="single-footer-widget">
                                <h6 class="footer_title">About Biznance</h6>
                                <p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point where images and videos are</p>
                            </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'name' => 'Footer Navigation',
                'content' => '
                            <div class="single-footer-widget">
                                <h6 class="footer_title">Navigation Links</h6>
                                <div class="row">
                                    <div class="col-4">
                                        <ul class="list">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/company">Company</a></li>
                                            <li><a href="/about">About</a></li>
                                            <li><a href="/testimonial">Testimonial</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <ul class="list">
                                            <li><a href="/contact">Contact</a></li>
                                            <li><a href="/faq">FAQ</a></li>
                                            <li style="width: 90px;"><a href="/privacy">Privacy Policy</a></li>
                                        </ul>
                                    </div>										
                                </div>							
                            </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
               'name' => 'Footer Newsletter',
               'content' => '
                           <h6 class="footer_title">Newsletter</h6>
                           <p>For business professionals caught between high OEM price and mediocre print and graphic output, </p>		
                           ',
               'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('modules')->insert($records);
    }

}