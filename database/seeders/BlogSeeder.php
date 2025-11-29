<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Categories
        $categories = [
            'Dynamics 365',
            'Power Platform',
            'Business Central',
            'Power BI',
            'Cloud Migration',
            'Industry Insights',
            'Company News'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category)],
                ['name' => $category]
            );
        }

        // Tags
        $tags = [
            'CRM', 'ERP', 'Automation', 'Analytics', 'Digital Transformation',
            'Microsoft', 'Azure', 'AI', 'Copilot', 'Sales', 'Marketing',
            'Customer Service', 'Finance', 'Supply Chain'
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag]
            );
        }
    }
}
