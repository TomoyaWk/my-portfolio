<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->delete();
        DB::table('post')->insert(
            [
                'post_id' => '1',
                'title' => 'テストブログタイトル1',
                'content' => '記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト',
                'draft_flg' => '1',
                'author_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
