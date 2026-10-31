<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Language;
use App\Models\Person;
use App\Models\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $annapolis = City::firstOrCreate([
            'name' => 'Annapolis',
        ]);

        $paris = City::firstOrCreate([
            'name' => 'Paris',
        ]);

        $english = Language::firstOrCreate([
            'name' => 'English',
        ]);

        $spanish = Language::firstOrCreate([
            'name' => 'Spanish',
        ]);

        $person = Person::firstOrCreate([
            'name' => 'Duplicate',
        ]);

        $person_unique = Person::firstOrCreate([
            'name' => 'Unique',
        ]);

        $person_the_third = Person::firstOrCreate([
            'name' => 'Third Person',
        ]);

        $title = Title::firstOrCreate([
            'sort_title' => 'Has Duplicate People',
            'abbreviation' => 'DUP'
        ]);

        $title->languages()->attach(
            [
                $english->id => ['text' => 'watch me dissapear'],
                $spanish->id => ['text' => 'odd']
            ]
        );

        $title->languages()->attach(
            [
                $english->id => ['text' => 'detach me first'],
                $spanish->id => ['text' => 'another']
            ]
        );

        $title->people()->attach([
            $person->id => ['role' => 'role1', 'text' => 'detach me first, I will detach'],
        ]);

        $title->people()->attach([
            $person->id => ['role' => 'role2', 'text' => 'then try to detach me, nope']
        ]);

        $title->people()->attach([
            $person->id => ['role' => 'role3', 'text' => 'then try to detach me, broken']
        ]);

        $title->cities()->attach(
            [
                $annapolis->id => ['text' => 'detach me first'],
                $paris->id => ['text' => 'detach me next, I work'],
            ]
        );

        $title->cities()->attach(
            [
                $annapolis->id => ['text' => 'you can not detach me' ],
            ]
        );

//        //Generate random titles
//        Title::factory()
//            ->count(10)
//            ->hasLanguages(3)
//            ->hasCities(3)
//            ->hasAttached(
//                Person::factory()->count(3),
//                fn () => [
//                    'role' => fake()->randomElement([
//                        'editor',
//                        'author',
//                        'contributor',
//                        'director',
//                    ]),
//                    'text' => fake()->sentence(),
//                ],
//                'people'
//            )
//            ->create();

    }
}
