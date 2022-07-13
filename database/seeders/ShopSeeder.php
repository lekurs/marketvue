<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::factory(100)
            ->create()
            ->each(callback: fn(Shop $shop) => $shop
                ->activities()
                ->sync(
                    ids: Activity::all()
                        ->random(number: 4),
                    detaching: false
                )
            );
    }
}
