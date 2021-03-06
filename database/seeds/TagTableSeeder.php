<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
            'name' => 'Japanese',
            ],
            [
            'name' => 'French',
            ],
            [
            'name' => 'Italian',
            ],
            [
            'name' => 'Chinese',
            ],
            [
            'name' => 'Korean',
            ],
            [
            'name' => 'Spanish',
            ],
            [
            'name' => 'Indian',
            ],
            [
            'name' => 'Ethnic',
            ],
            [
            'name' => 'Izakaya・Bar',
            ],
            [
            'name' => 'Café',
            ],
            [
            'name' => '',
            ],
         ]);    
    }
}
