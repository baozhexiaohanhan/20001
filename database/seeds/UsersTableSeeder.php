<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand')->insert([
            'brand_name' => Str::random(10),
            'brand_url' => Str::random(10).'@gmail.com',
            'brand_logo' => 'http://www.blog.com/upload/o39UMW4Cn4b357H6QwKhBT15SMNfQfLpanzyST7I.jpeg',
            'brand_desc' => Str::random(10),
        ]);
    }
}
