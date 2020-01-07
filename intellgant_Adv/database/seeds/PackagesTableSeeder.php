<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Package::create([
        "name" => "Package 1",
        "price" => "10",
        "allowed_ads" => "4",
        "duration" => "365",
        "description" => "
          hdgehgdhgheg\r\n
          fhfgrugfuyreuf
          ",
        "allow_statistics" => "1",
      ]);
    }
}
