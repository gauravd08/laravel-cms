<?php
use Illuminate\Database\Seeder;

class PrivacyPageSections extends Seeder
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
                'page_id' => '4',
                'section_name' => 'section-1',
                'content' => '
                            <h3 class="wthree w3-agileits agileits-w3layouts agile w3-agile">Privacy Policy</h3>
                            <div class="banner-bottom-grid1 privacy1-grid">
                                <ul>
                                    <li>Profile <span>Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>
                                </ul>
                                <ul>
                                    <li>Search <span>Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>
                                </ul>
                                <ul>
                                    <li>News Feed <span>Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>
                                </ul>
                                <ul>
                                    <li>Applications <span>Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>
                                </ul>
                            </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
            [
                'page_id' => '4',
                'section_name' => 'section-2',
                'content' => '
                                <h3 class="terms-conditions-head">Terms & Conditions</h3>
                                <div class="banner-bottom-grid1 privacy2-grid">
                                    <div class="privacy2-grid1">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                        <div class="privacy2-grid1-sub">
                                            <h5>1. sint occaecat cupidatat non proident, sunt</h5>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="privacy2-grid1-sub">
                                            <h5>2. perspiciatis unde omnis iste natus error</h5>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="privacy2-grid1-sub">
                                            <h5>3. natus error sit voluptatem accusant</h5>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="privacy2-grid1-sub">
                                            <h5>4. occaecat cupidatat non proident, sunt in</h5>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="privacy2-grid1-sub">
                                            <h5>5. deserunt mollit anim id est laborum</h5>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            ',
                'updated_at' => '2018-12-21 12:00:00',
            ],
        ];

        DB::table('page_sections')->insert($records);
    }

}