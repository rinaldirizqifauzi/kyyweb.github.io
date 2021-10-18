<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     

        // User::create([
        //     'name'=> 'Rinaldi Rizqi Fauzi',
        //     'email'=> 'kyy@gmail.com',
        //     'password'=> bcrypt('Lavesfar123')
        // ]);
        
        // User::create([
        //     'name'=> 'Franco',
        //     'email'=> 'franco@gmail.com',
        //     'password'=> bcrypt('Lavesfar123')
        // ]);


        User::factory(3)->create();    
        
        Category::create([
            'name'=> 'Web Programming',
            'slug'=> 'web-programming',
        ]);
        
        Category::create([
            'name'=> 'Web Desaign',
            'slug'=> 'web-desaign',
        ]);
        
        Category::create([
            'name'=> 'Personal',
            'slug'=> 'personal',
        ]);
        
        Post::factory(20)->create();

        // Post::create([
        //     'title'=> 'Judul Pertama',
        //     'slug'=> 'judul-pertama',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, maiores?',
        //     'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore quidem earum in facere beatae. Veritatis, autem voluptatum mollitia libero hic omnis? Delectus unde dolor earum corporis explicabo numquam ratione animi!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        
        // Post::create([
        //     'title'=> 'Judul Kedua',
        //     'slug'=> 'judul-ke-dua',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, maiores?',
        //     'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore quidem earum in facere beatae. Veritatis, autem voluptatum mollitia libero hic omnis? Delectus unde dolor earum corporis explicabo numquam ratione animi!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        
        // Post::create([
        //     'title'=> 'Judul Ketiga',
        //     'slug'=> 'judul-ke-ketiga',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, maiores?',
        //     'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore quidem earum in facere beatae. Veritatis, autem voluptatum mollitia libero hic omnis? Delectus unde dolor earum corporis explicabo numquam ratione animi!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title'=> 'Judul Keempat',
        //     'slug'=> 'judul-ke-keempat',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, maiores?',
        //     'body'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore quidem earum in facere beatae. Veritatis, autem voluptatum mollitia libero hic omnis? Delectus unde dolor earum corporis explicabo numquam ratione animi!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
