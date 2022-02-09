<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creo le categorie
        $data = ['HTML', 'CSS', 'JAVASCRIPT', 'PHP'];

        //ciclo le categorie, ad ogni ciclo creo una nuova istanza e gli do un nome che corrisponde a uno dei data
        //e uno slug
        foreach($data as $cat){
            $new_cat = new Category();
            $new_cat->name = $cat;
            $new_cat->slug = Str::slug('$cat', '-');
            $new_cat->save();
        }
    }
}
