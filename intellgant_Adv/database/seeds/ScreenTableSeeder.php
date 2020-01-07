<?php

use App\Screen;
use Illuminate\Database\Seeder;

class ScreenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Screen::create([
            'name' => 'Waiting',
            'description' => "I do not receive any errors. Also, even the \"cascade\" option doesn't work (only on the gallery table). Deleting a gallery deletes all pictures.",
            'user_id' => User::find(2)->id,
            'default_url' => 'http://18.188.164.175/videos/Adv5dfa9add35b32.webm',
            'waiting_url' => 'http://18.188.164.175/videos/Adv5dfa9add35b32.webm',
            'code' => 54,
            'status' => 1
        ])
        
    }
}
