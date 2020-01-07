<?php

use App\AdvModel;
use Illuminate\Database\Seeder;

class AdsModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = ['glasses', 'gender', 'age', 'scene', 'count'];
        foreach ($models as $model) {
            AdvModel::create(['name' => $model]);
        }
    }
}
