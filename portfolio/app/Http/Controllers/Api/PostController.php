<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;



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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
