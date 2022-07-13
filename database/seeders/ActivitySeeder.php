<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('activities') as $activity) {
            Activity::create([
                'label' => $activity['label'],
                'description' => $activity['description'],
                'icon' => $activity['icon'],
                'slug' => $activity['slug'],
            ]);
        }
    }
}
