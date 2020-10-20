<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Symfony\Component\HttpKernel\Exception\HttpException;


class PostController extends Controller
{
    /**
     *Blogページ用公開記事の一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $model = new Post();
        $postData = $model->getPublicPost();

        return $postData;
    }


    /**
     * ログイン後の記事一覧ページ
     * 公開・非公開記事すべての一覧取得.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Post();
        $postData = $model->getAllPost();

        return $postData;
    }

    /**
     * 新規記事投稿
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $postData = $req->all();

        try {
            Post::create([
                'title' => $postData['title'],
                'content' => $postData['content'],
                'draft_flg' => $postData['draft_flg'],
                'author_id' => 1
            ]);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * ID指定で記事情報取得.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Post();
        $postData = $model->getIndivPost($id);

        return $postData;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
