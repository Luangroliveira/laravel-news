<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $page = $request->page ? $request->page : 1;

        $search =  $request->search;

        if($search)
            $pagina = 'https://newsapi.org/v2/everything?language=pt&pageSize=12&apiKey='.env("API_KEY").'&page='.$page.'&q='.$search;
        else
            $pagina = 'https://newsapi.org/v2/top-headlines?language=pt&pageSize=12&apiKey='.env("API_KEY").'&page='.$page;

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_URL, $pagina );

        // define que o conteúdo obtido deve ser retornado em vez de exibido
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $retorno = json_decode(curl_exec( $ch ));

        curl_close( $ch );

        $news = collect($retorno->articles);

        $max_pages = $retorno->totalResults/12;

        return view('home',['news' => $news, 'page' => $page, 'search' => $search, 'max_pages' => $max_pages]);
    }
}
