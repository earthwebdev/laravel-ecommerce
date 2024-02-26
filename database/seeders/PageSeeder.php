<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::factory()->create([
            "title"=> "About Us",
            "slug"=> "about-us",
        ]);
        Page::factory()->create([
            "title"=> "Contact Us",
            "slug"=> "contact-us",
        ]);

        Page::factory()->create([
            "title"=> "Faqs",
            "slug"=> "faqs",
        ]);

        Page::factory()->create([
            "title"=> "Return",
            "slug"=> "return",
        ]);

        Page::factory()->create([
            "title"=> "Terms and Conditions",
            "slug"=> "terms-and-conditions",
        ]);

        Page::factory()->create([
            "title"=> "Privacy Policy",
            "slug"=> "privacy-policy",
        ]);


    }
}
