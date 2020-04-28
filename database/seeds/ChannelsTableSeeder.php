<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1=['title'=>'laravel','slug'=>str_slug('laravel')];
        $channel2=['title'=>'veujs','slug'=>str_slug('veujs')];
        $channel3=['title'=>'CSS3','slug'=>str_slug('CSS3')];
        $channel4=['title'=>'javascript','slug'=>str_slug('javascript')];
        $channel5=['title'=>'php testing','slug'=>str_slug('php testing')];
        $channel6=['title'=>'spark','slug'=>str_slug('spark')];
        $channel7=['title'=>'lumen','slug'=>str_slug('lumen')];
        $channel8=['title'=>'forge','slug'=>str_slug('forge')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}
