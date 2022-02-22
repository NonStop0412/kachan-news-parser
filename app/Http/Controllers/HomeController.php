<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Source;

class HomeController extends Controller
{
    public function index()
    {
        /** @var Collection $feeds */
        $feeds = Article::all()->sortByDesc('published_date')->take(10);
        $lastArt = new \DateTime($feeds->last()->published_date);

        return view('news', ['feeds' => $feeds, 'lastArt' => $lastArt->getTimestamp()]);
    }

    public function loadNews(Request $request)
    {
        $page = (int)($request->query('page'));
        $date = $request->query('lastArt');
        $lastArt = new \DateTime();
        $lastArt ->setTimestamp($date);

        $formResult = static function (string $message, bool $isSuccess, array $data = []){
            return [
                'message' => $message,
                'success' => $isSuccess,
                'data' => $data
            ];
        };

        if ($page < 1) {
            return response()->json($formResult('Page is wrong!', false))->setStatusCode(400);
        }

        if ($page >= 1) {
            --$page;
        }

        $offset = $page * 10;
        $feeds = Article::all()->where('published_date', '<', $lastArt->format('Y-m-d H:i:s'))->sortByDesc('published_date')->skip($offset)->take(10);

        $feeds->map(function ($feed) {
            $feed->published_date = date("d.m.y H:i", strtotime($feed->published_date));
            $feed->source_name = Source::getName($feed->source_id);

            return $feed;
        });

        if ($feeds->isEmpty()){
            return response()->json($formResult('No data', false))->setStatusCode(404);
        }

        return response()->json($formResult('Successful',true, array_values($feeds->toArray())));
    }
}
