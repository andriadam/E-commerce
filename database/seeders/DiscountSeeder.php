<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discounts = [
            [
                'name' => 'Diskon Lebaran',
                'code' => 'AAD12',
                'description' => 'Diskon.....',
                'percentage' => 10,
                'max_disc' => 10000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'Diskon Awal Tahun',
                'code' => 'AAD13',
                'description' => 'Diskon.....',
                'percentage' => 20,
                'max_disc' => 20000,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];
        Discount::insert($discounts);
    }
}
