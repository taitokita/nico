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
            'name' => '和食',
            ],
            [
            'name' => 'フレンチ',
            ],
            [
            'name' => 'イタリアン',
            ],
            [
            'name' => 'チャイニーズ',
            ],
            [
            'name' => 'コリアン',
            ],
            [
            'name' => 'スパニッシュ',
            ],
            [
            'name' => 'インド',
            ],
            [
            'name' => 'エスニック',
            ],
            [
            'name' => '居酒屋・Bar',
            ],
            [
            'name' => 'Café',
            ],
         ]);    
    }
}
