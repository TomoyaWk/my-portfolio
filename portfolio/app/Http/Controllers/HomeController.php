<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Facade\FlareClient\Http\Exceptions\NotFound;

class HomeController extends Controller
{
    public function setOgp(Request $req)
    {
        $url = request()->url();
        $path = explode('/', request()->path());

        //初期値
        $type = 'website';
        $desc = 'Tomoyawkのポートフォリオサイトです。都内でwebエンジニアとして働いています';
        $siteName = "Tomoyawk.";

        switch ($path[0]) {
            case '':
                $title = "Home --- $siteName";
                break;

            case 'works':
                $title = "Works --- $siteName";
                break;

            case 'blog' and $path[1] === "list":
                $title = "Blog --- $siteName";
                break;

            case 'blog' and is_numeric($path[1]):
                $type = 'article';
                $postInfo = Post::where('post_id', '=', $path[1])->first();

                if (is_null($postInfo)) {
                    $title = "NotFound";
                    $desc = "NotFound";
                } else {
                    clock($postInfo);
                    $title = "$postInfo->title -- $siteName";
                    $desc = mb_substr($postInfo->content, 0, 75, 'utf-8') . '.....';
                }

                break;

            default:
                $title = $siteName;
                $desc = "NotFound";
                break;
        };

        $ogp = [
            'title' => $title,
            'url' => $url,
            'type' => $type,
            'desc' => $desc,
        ];
        return view("home", $ogp);
    }
}
