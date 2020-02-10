<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 50)->create()->each(function (Product $product) {
            $product->categories()->attach($this->getRandomCategoriesIds());
            $product->tags()->attach($this->getRandomTagsIds());
        });
    }

    /**
     * @return array
     */
    private function getRandomCategoriesIds() : array
    {
        return Category::query()->inRandomOrder()->limit(rand(1, 5))->pluck('id')->toArray();
    }

    /**
     * @return array
     */
    private function getRandomTagsIds() : array
    {
        return Tag::query()->inRandomOrder()->limit(rand(5, 15))->pluck('id')->toArray();
    }
}
