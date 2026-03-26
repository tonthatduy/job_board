<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Level;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Job
        $jobs = [
                // Job 1
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 80000,
                'salary_to' => 200000,
                'location' => 'San Francisco',
                'remote' => true,
                'level' => 'Senior',
                'type' => 'Full-time',
                'apply_url' => 'https://google.com',
                'company' => [
                    'name' => 'Google',
                    'logo' => 'https://cdn.sheetany.com/files/62s3Bya34W.png',
                    'website' => 'https://google.com'
                ],
                'category' => 'Engineer',
            ],
                // Job 2
            [
                'title' => 'Senior Marketing Lead',
                'slug' => 'senior-marketing-lead',
                'description' => 'https://docs.google.com/document/d/1wu1obrAXEk1nMqh37Xg-tYt1fwZrTVSIUAQW_ANlQm0/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'London',
                'remote' => false,
                'level' => 'Middle',
                'type' => 'Internship',
                'apply_url' => 'https://amazon.com',
                'company' => [
                    'name' => 'Amazon',
                    'logo' => 'https://cdn.sheetany.com/files/l4YwwTsk1h.png',
                    'website' => 'https://amazon.com'
                ],
                'category' => 'Marketing',
            ],
                // Job 3
            [
                'title' => 'Product Manager',
                'slug' => 'product-manager',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 130000,
                'location' => 'New York',
                'remote' => true,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://netflix.com',
                'company' => [
                    'name' => 'Neflix',
                    'logo' => 'https://cdn.sheetany.com/files/xHz4cTKDxe.png',
                    'website' => 'https://netflix.com'
                ],
                'category' => 'Engineer',
            ],

                // Job 4
            [
                'title' => 'IT Support Specialist',
                'slug' => 'it-support-specialist',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'Paris',
                'remote' => false,
                'level' => 'Senior',
                'type' => 'Part-time',
                'apply_url' => 'https://x.com',
                'company' => [
                    'name' => 'Twitter',
                    'logo' => 'https://cdn.sheetany.com/files/J7QVCQV353.png',
                    'website' => 'https://x.com'
                ],
                'category' => 'Design',
            ],

                // Job 5
            [
                'title' => 'Senior Data Engineer',
                'slug' => 'senior-data-engineer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'San Francisco',
                'remote' => true,
                'level' => 'Entry',
                'type' => 'Full-time',
                'apply_url' => 'https://spotify.com',
                'company' => [
                    'name' => 'Spotify',
                    'logo' => 'https://cdn.sheetany.com/files/GLYhhICTtX.png',
                    'website' => 'https://spotify.com'
                ],
                'category' => 'Design',
            ],

                // Job 6
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 110000,
                'salary_to' => 130000,
                'location' => 'Amsterdam',
                'remote' => false,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://uber.com',
                'company' => [
                    'name' => 'Uber',
                    'logo' => 'https://cdn.sheetany.com/files/lzQE1B4cnW.png',
                    'website' => 'https://uber.com'
                ],
                'category' => 'Marketing',
            ],

                // Job 7
            [
                'title' => 'Data Engineer',
                'slug' => 'data-engineer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 70000,
                'salary_to' => 120000,
                'location' => 'Mountain View',
                'remote' => true,
                'level' => 'Middle',
                'type' => 'Full-time',
                'apply_url' => 'https://airbnb.com',
                'company' => [
                    'name' => 'Airbnb',
                    'logo' => 'https://cdn.sheetany.com/files/ZjTzZSfNvV.png',
                    'website' => 'https://airbnb.com'
                ],
                'category' => 'Engineer',
            ],

                // Job 8
            [
                'title' => 'Staff Software Engineer',
                'slug' => 'staff-software-engineer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 1220000,
                'location' => 'London',
                'remote' => false,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://facebook.com',
                'company' => [
                    'name' => 'Facebook',
                    'logo' => 'https://cdn.sheetany.com/files/LGp55aLpA1.png',
                    'website' => 'https://facebook.com'
                ],
                'category' => 'Design',
            ],

                // Job 9
            [
                'title' => 'Front-End Developer',
                'slug' => 'front-end-developer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'Paris',
                'remote' => true,
                'level' => 'Entry',
                'type' => 'Full-time',
                'apply_url' => 'https://www.instagram.com/',
                'company' => [
                    'name' => 'Instagram',
                    'logo' => 'https://cdn.sheetany.com/files/FIiM9tVTwj.png',
                    'website' => 'https://www.instagram.com/'
                ],
                'category' => 'Engineer',
            ],

                // Job 10
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 100000,
                'salary_to' => 150000,
                'location' => 'New York',
                'remote' => false,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://google.com',
                'company' => [
                    'name' => 'Google',
                    'logo' => 'https://cdn.sheetany.com/files/62s3Bya34W.png',
                    'website' => 'https://google.com'
                ],
                'category' => 'Marketing',
            ],

                // Job 11
            [
                'title' => 'Product Manager',
                'slug' => 'product-manager',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 150000,
                'salary_to' => 200000,
                'location' => 'Tokyo',
                'remote' => true,
                'level' => 'Middle',
                'type' => 'Full-time',
                'apply_url' => 'https://x.com',
                'company' => [
                    'name' => 'Twitter',
                    'logo' => 'https://cdn.sheetany.com/files/J7QVCQV353.png',
                    'website' => 'https://x.com'
                ],
                'category' => 'Engineer',
            ],

                // Job 12
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => 'https://docs.google.com/document/d/1o11WVL2RDRs97JhTFwxXB9npGt2lUuLEynXoXAYJryA/edit?usp=sharing',
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'Toronto',
                'remote' => true,
                'level' => 'Fresher',
                'type' => 'Full-time',
                'apply_url' => 'https://amazon.com',
                'company' => [
                    'name' => 'Amazon',
                    'logo' => 'https://cdn.sheetany.com/files/l4YwwTsk1h.png',
                    'website' => 'https://amazon.com'
                ],
                'category' => 'Marketing',
            ],

        ];

        foreach ($jobs as $item) {
            $company = Company::firstOrCreate(
                ['name' => $item['company']['name']],
                ['logo' => $item['company']['logo'],
                 'website' => $item['company']['website']
                ]
            );

            $location = Location::firstOrCreate(
                ['name' => $item['location']]
            );

            $level = Level::firstOrCreate(
                ['name' => $item['level']]
            );

            $category = Category::firstOrCreate(
                ['name' => $item['category']]
            );

            $job = Job::create([
                'title' => $item['title'],
                'slug' => $item['slug'] . '-' . Str::random(5),
                'description' => $item['description'],
                'salary_from' => $item['salary_from'],
                'salary_to' => $item['salary_to'],
                'is_remote' => $item['remote'],
                'type' => $item['type'],
                'apply_url' => $item['apply_url'],
                'company_id' => $company->id,
                'location_id' => $location->id,
                'level_id' => $level->id,
                'expired_at' => now()->addYear(),
            ]);

            $job->categories()->attach($category->id);

        }

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
