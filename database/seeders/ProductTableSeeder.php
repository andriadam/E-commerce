<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_name' => 'Produk 1',
                'product_class_id' => 1,
                'product_group_id' => 1,
                'price' => 100000,
                'stock' => 100,
                'description' => 'Lorem 1 ipsum dolor sit amet consectetur, adipisicing elit. Natus maiores sequi hic modi dolorum architecto asperiores cupiditate consectetur debitis minus atque, quisquam ab commodi quidem, qui non velit omnis error fugit delectus ut ullam voluptatem deleniti? Sunt modi qui eligendi delectus laboriosam est quas? Voluptas, facere? Sequi, veritatis. Minima, cumque?</p><>Maiores corporis magnam libero autem placeat excepturi dolore odio sequi, quae sit sint modi eveniet dicta natus ab dolores est minus quam qui blanditiis. Possimus blanditiis quaerat consequuntur dicta quisquam. In, facilis? Iure ut laborum architecto optio saepe debitis voluptate similique. Cumque, totam. Alias inventore eum exercitationem.',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'product_name' => 'Produk 2',
                'product_class_id' => 2,
                'product_group_id' => 2,
                'price' => 120000,
                'stock' => 100,
                'description' => 'Lorem 2 ipsum dolor sit amet consectetur, adipisicing elit. Natus maiores sequi hic modi dolorum architecto asperiores cupiditate consectetur debitis minus atque, quisquam ab commodi quidem, qui non velit omnis error fugit delectus ut ullam voluptatem deleniti? Sunt modi qui eligendi delectus laboriosam est quas? Voluptas, facere? Sequi, veritatis. Minima, cumque?</p><>Maiores corporis magnam libero autem placeat excepturi dolore odio sequi, quae sit sint modi eveniet dicta natus ab dolores est minus quam qui blanditiis. Possimus blanditiis quaerat consequuntur dicta quisquam. In, facilis? Iure ut laborum architecto optio saepe debitis voluptate similique. Cumque, totam. Alias inventore eum exercitationem.',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'product_name' => 'Produk 3',
                'product_class_id' => 3,
                'product_group_id' => 3,
                'price' => 130000,
                'stock' => 100,
                'description' => 'Lorem 3 ipsum dolor sit amet consectetur, adipisicing elit. Natus maiores sequi hic modi dolorum architecto asperiores cupiditate consectetur debitis minus atque, quisquam ab commodi quidem, qui non velit omnis error fugit delectus ut ullam voluptatem deleniti? Sunt modi qui eligendi delectus laboriosam est quas? Voluptas, facere? Sequi, veritatis. Minima, cumque?</p><>Maiores corporis magnam libero autem placeat excepturi dolore odio sequi, quae sit sint modi eveniet dicta natus ab dolores est minus quam qui blanditiis. Possimus blanditiis quaerat consequuntur dicta quisquam. In, facilis? Iure ut laborum architecto optio saepe debitis voluptate similique. Cumque, totam. Alias inventore eum exercitationem.',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
        ];
        Product::insert($products);
    }
}
