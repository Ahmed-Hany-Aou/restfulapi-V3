<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         DB::statement('SET FOREIGN_KEY_CHECKS = 0');
         User::truncate();
         Category::truncate();
         Product::truncate();
         Transaction::truncate();
         DB::table('category_product')->truncate();

        User:: flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();




         $usersQuantity = 1000;
         $categoriesQuantity = 30;
         $productsQuantity = 1000;
         $transactionsQuantity = 1000;
 
         factory(User::class, $usersQuantity)->create();
         factory(Category::class, $categoriesQuantity)->create();
 
         factory(Product::class, $productsQuantity)->create()->each(
             function ($product) {
                 $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
 
                 $product->categories()->attach($categories);
             });
             factory(Transaction::class, $transactionsQuantity)->create();
 
    }
}