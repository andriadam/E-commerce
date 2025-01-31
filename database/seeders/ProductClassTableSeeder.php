<?php

namespace Database\Seeders;

use App\Models\ProductClass;
use Illuminate\Database\Seeder;

class ProductClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products_class = [
            [
                'class_name' => 'kelas-1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'class_name' => 'kelas-2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'class_name' => 'kelas-3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];
        ProductClass::insert($products_class);
    }
}
