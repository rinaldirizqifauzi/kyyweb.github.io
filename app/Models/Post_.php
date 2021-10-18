<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Franco",
            "body" => "    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis asperiores, 
            nostrum corrupti temporibus nam laudantium dolore, 
            dignissimos impedit earum eum maiores, 
            aliquam quam nihil quis reprehenderit incidunt eveniet aut repellendus!    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis asperiores,
            nostrum corrupti temporibus nam laudantium dolore, dignissimos impedit earum eum maiores, aliquam quam nihil quis reprehenderit incidunt eveniet aut repellendus!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Aulus",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis asperiores, 
            nostrum corrupti temporibus nam laudantium dolore, 
            dignissimos impedit earum eum maiores, 
            aliquam quam nihil quis reprehenderit incidunt eveniet aut repellendus!    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis asperiores,
            nostrum corrupti temporibus nam laudantium dolore, dignissimos impedit earum eum maiores, aliquam quam nihil quis reprehenderit incidunt eveniet aut repellendus!"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
