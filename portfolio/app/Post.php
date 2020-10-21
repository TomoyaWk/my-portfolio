<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

use function PHPSTORM_META\type;

class Post extends Model
{
    const TABLE = 'post';
    protected $table = 'post';
    protected $fillable = [
        'title', 'content', 'draft_flg', 'author_id', 'created_at', 'updated_at'
    ];

    /**
     * 全記事データ取得
     * 
     * retrurn obuject $data
     */
    public function getAllPost()
    {

        $post = DB::table(self::TABLE);
        $data = $post->get();

        return $data;
    }

    /**
     * 下書き状態でない（公開）の記事データを取得する
     * 
     * retrurn obuject $data
     */
    public function getPublicPost()
    {
        $post = DB::table(self::TABLE);
        $data = $post->where('draft_flg', '=',  "0")->get();

        return $data;
    }

    /**
     * 個別記事データ取得
     * 
     * retrurn obuject $data
     */
    public function getIndivPost($id)
    {
        $post = DB::table(self::TABLE);

        $data = $post->where([
            ['post_id', '=', $id],
            ['draft_flg', '=', "0"]
        ])->get();

        return $data;
    }
}
