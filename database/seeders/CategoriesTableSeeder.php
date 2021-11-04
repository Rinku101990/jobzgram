<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Category::truncate();

        $category = [   
        	['name'=>'Actor','icon'=>'default.png','status'=>'active'],
        	['name'=>'Model','icon'=>'default.png','status'=>'active'],
            ['name'=>'Singer','icon'=>'default.png','status'=>'active'],
            ['name'=>'Musician','icon'=>'default.png','status'=>'active'],
            ['name'=>'Dancer','icon'=>'default.png','status'=>'active'],
            ['name'=>'Anchor','icon'=>'default.png','status'=>'active'],
        ];
            Category::insert($category);

    }
}
