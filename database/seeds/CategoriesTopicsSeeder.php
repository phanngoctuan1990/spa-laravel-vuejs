<?php

use App\Topic;
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	Topic::truncate();
    	Category::truncate();
        factory(Category::class, 5)->create()->each(function($c) {
        	$c->topics()->saveMany(
        		factory(Topic::class, 50)->create([
        			'category_id' => $c->id
        		])
        	);
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
