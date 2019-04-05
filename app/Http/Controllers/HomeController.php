<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function php(Request $request)
    {
        $page = $request->page ? $request->page : 1;

        $search = str_replace(" ", "+",$request->search);
        if($search){
            $pagina = 'https://newsapi.org/v2/everything?language=pt&pageSize=12&apiKey='.env("API_KEY").'&page='.$page.'&q='.$search;
        }else{
            $pagina = 'https://newsapi.org/v2/top-headlines?language=pt&pageSize=12&apiKey='.env("API_KEY").'&page='.$page;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $pagina);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        $news = collect($response->articles);

        $max_pages = $response->totalResults/12;

        return view('php',['news' => $news, 'page' => $page, 'search' => $search, 'max_pages' => $max_pages]);
    }
}
