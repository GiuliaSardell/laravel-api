<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public static function generateSlug($title){

        //genero lo slug
        $slug = Str::slug($title);
        $slug_base = $slug;

        //verifico se è presente nel db -> con una query
        //sarebbe: SELECT * FROM posts WHERE slug = $slug -> FIRST ti da solo il primo risultato di un oggetto altrimenti avrei un array
        $post_presente = Post::where('slug', $slug)->first();

        //se è presente concateno allo slug un contatore
        $counter = 1;
        while($post_presente){
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_presente = Post::where('slug', $slug)->first();
        }

        return $slug;
    }

    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];


    public function Category(){
        return $this->belongsTo('App\Category');
    }

    public function Tags(){
        return $this->belongsToMany('App\Tag');
    }
}
