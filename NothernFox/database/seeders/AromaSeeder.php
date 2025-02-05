<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class AromaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("aromas")->insert([
            'name'=>'Аромасвеча',
            'description'=> 'Ведьмин котел, Эликсир вечности, Слезы нимфы, Амулет перерождения, Нектар богов, Оксфорд, Алхимия осени, Банановая булочка',
            'price'=>'890',
            'count'=>'5',
        ]);
    }
}
