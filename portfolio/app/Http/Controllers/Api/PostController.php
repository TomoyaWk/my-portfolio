<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
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

        if ($postData->isEmpty()) {
            return response()->json(['error' => 404, 'message' => 'PostData is Not found'], 404);
        }

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
        if ($postData->isEmpty()) {
            return response()->json(['error' => 404, 'message' => 'PostData is Not found'], 404);
        }

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
            return response()->json(['message' => 'error!'], 400);
        }
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

        if ($postData->isEmpty()) {
            return response()->json(['error' => 404, 'message' => 'PostData is Not found'], 404);
        }

        return $postData;
    }

    /**
     * 編集用ページ記事情報取得.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postData = Post::where('post_id', $id)->first();

        if (is_null($postData)) {
            return response()->json(['error' => 404, 'message' => 'PostData is Not found'], 404);
        }
        return $postData;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $postData = $req->all();

        try {
            Post::where('post_id', $id)->update(
                [
                    'title' => $postData['title'],
                    'content' => $postData['content'],
                    'draft_flg' => $postData['draft_flg'],
                    'author_id' => 1
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['message' => 'error!'], 400);
        }
        return response()->json(['message' => "{$postData['title']} が更新されました"], 200);
    }

    /**
     * Remove the specified resource from storage.
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePostData = Post::where('post_id', $id);
        try {
            $deletePostData->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'error!'], 400);
        }
        return response()->json(['message' => "指定したデータを削除しました"], 200);
    }


    /**
     * 画像ファイルアップロード
     * 
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function uploadImg(Request $req)
    {

        $files = $req->file();
        try {
            $imgNum = 1;
            $data = [];
            foreach ($files as $image) {
                $fileName = $image->getClientOriginalName();
                $disk = Storage::disk('s3');

                $imgPath = $disk->putFileAs('/blog', $image, $fileName, 'public');
                $fullPath = $disk->url($imgPath);

                array_push($data, [$imgNum, $fullPath]);
                $imgNum++;
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'error!'], 400);
        }
        //[[1,url],[2,url]…]の形で返す
        return response()->json($data, 200);
    }
}
