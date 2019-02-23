<?php
use Illuminate\Database\Seeder;

class CompanyPageSections extends Seeder
{
    public function run()
    {
        $records = [
            [
                'page_id' => '3',
                'section_name' => 'section-1',
                'content' => '
                            <h4 class="company-content-1">We create brand new corportate identities</h4>
                            <p class="company-content-2">We Build Technologies that touches lives. True faith of triumph comes, working with an associate you trust, to provide the insight, support and proficiency that will boost your business ahead..</p>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'page_id' => '3',
                'section_name' => 'section-2',
                'content' => '
                            <p class="company-content-3">Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_sections')->insert($records);
    }
    
}
