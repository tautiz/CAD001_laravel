<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Elektronika',
                'slug' => 'elektronika',
                'description' => 'Elektronikos prietaisai',
                'image' => '/img/categories/category-2.jpg',
            ],
            [
                'name' => 'Statybinė technika',
                'slug' => 'statybine-technika',
                'description' => 'Statybinių įrankių ir įrengimų kategorija',
                'image' => '/img/categories/category-3.jpg',
            ],
            [
                'name' => 'Namų apyvokos reikmenys',
                'slug' => 'namu-apyvokos-reikmenys',
                'description' => 'Namų apyvokos reikmenų ir priedų kategorija',
                'image' => '/img/categories/category-4.jpg',
            ],
            [
                'name' => 'Kompiuterinė technika',
                'slug' => 'kompiuterine-technika',
                'description' => 'Kompiuterių ir IT įrengimų kategorija',
                'image' => '/img/categories/category-5.jpg',
            ],
            [
                'name' => 'Auto prekės',
                'slug' => 'auto-prekes',
                'description' => 'Automobilių prekių ir aksesuarų kategorija',
                'image' => '/img/categories/category-6.jpg',
            ],
            [
                'name' => 'Sporto reikmenys',
                'slug' => 'sporto-reikmenys',
                'description' => 'Sporto reikmenų ir įrangos kategorija',
                'image' => '/img/categories/category-7.jpg',
            ],
            [
                'name' => 'Vaikų prekės',
                'slug' => 'vaiku-prekes',
                'description' => 'Vaikų prekių ir žaislų kategorija',
                'image' => '/img/categories/category-8.jpg',
            ],
            [
                'name' => 'Kosmetika ir higiena',
                'slug' => 'kosmetika-ir-higiena',
                'description' => 'Kosmetikos ir higienos produktų kategorija',
                'image' => '/img/categories/category-9.jpg',
            ],
            [
                'name' => 'Baldai',
                'slug' => 'baldai',
                'description' => 'Namų ir kanceliarijos baldų kategorija',
                'image' => '/img/categories/category-10.jpg',
            ],
            [
                'name' => 'Maisto prekės',
                'slug' => 'maisto-prekes',
                'description' => 'Maisto produktų ir ingredientų kategorija',
                'image' => '/img/categories/category-11.jpg',
            ],
            [
                'name' => 'Aksesuarai',
                'slug' => 'aksesuarai',
                'description' => 'Asmeniniams aksesuarams ir papuošalams',
                'image' => '/img/categories/category-12.jpg',
            ],
        ];

        foreach ($categories as $cat) {

            Category::updateOrCreate(
                [
                    'name' => $cat['name'],
                    'slug' => $cat['slug'],
                ],
                [
                    'description' => $cat['description'],
                    'image' => $cat['image'],
                    'status_id' => Status::where(['name' => 'Aktyvus', 'type'=>'product'])->first()->id,
                    'parent_id' => null,
                ]
            );
        }
    }
}
