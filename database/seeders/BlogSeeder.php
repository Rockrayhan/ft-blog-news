<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define category IDs
         $categoryIds = [1, 2, 4, 5, 6, 7,8];

         // Tags list
         $tagsList = [
             'tree, garden, flower',
             'technology, AI, innovation',
             'travel, adventure, exploration',
             'fitness, health, wellness',
             'food, cooking, recipes',
         ];
 
         // Loop through each category and add blogs
         foreach ($categoryIds as $categoryId) {
             // Randomly create 4 to 5 blogs for each category
             for ($i = 0; $i < rand(4,5); $i++) {
                 Blog::create([
                     'title' => Str::title(fake()->sentence(rand(3, 6))),
                     'content' => fake()->paragraphs(rand(3, 6), true),
                     'category_id' => $categoryId,
                     'author' => fake()->name(),
                     'tags' => $tagsList[array_rand($tagsList)],
                 ]);
             }
         }
    }
}
