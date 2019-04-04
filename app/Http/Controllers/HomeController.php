<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pagina = 'https://newsapi.org/v2/everything?q=economia&language=pt&apiKey=ede96d0e3fdd4169a1200179f1796469&pageSize=100';

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_URL, $pagina );

        // define que o conteúdo obtido deve ser retornado em vez de exibido
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $retorno = curl_exec( $ch );
        //dd($retorno);
        curl_close( $ch );

        $news = json_decode($retorno)->articles;
        //dd($news);
        return view('home',['news' => $news]);
    }
}
