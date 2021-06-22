<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function tokens()
    {
        $tokenUsed = DB::table('tokenUser')->where('tokenUser.status', 1)->count();
        $tokenFree = DB::table('tokenUser')->where('tokenUser.status', 0)->count();
        $listTokensFree = DB::table('tokenUser')->where('tokenUser.status',0)->get();


        return view('login.tokens',[
            'tokenUsed' => $tokenUsed,
            'tokenFree' => $tokenFree,
            'listTokensFree' => $listTokensFree,
        ]);
    }

    public function ranking(){
        $rankingUsers = DB::table('isgroupUsers')->select('isgroupUsers.id', 'isgroupUsers.imie', 'isgroupUsers.foto','isgroupUsers.ocena')->orderBy('ocena','desc')->limit(5)->get();

        return view('login.ranking',[
            'rankingUsers' => $rankingUsers,
        ]);
    }

    public function pytanie2(){
        $herbata = DB::table('questions')->where('questions.question2','Herbata')->count();
        $woda = DB::table('questions')->where('questions.question2','Woda')->count();
        $kawa = DB::table('questions')->where('questions.question2','Kawa')->count();
        $malpka = DB::table('questions')->where('questions.question2','Małpka')->count();

        return view('login.pytanie2',[
            'herbata' => $herbata,
            'woda' => $woda,
            'kawa' => $kawa,
            'malpka' => $malpka,
        ]);
    }

    public function pytanie3(){
        $pytanie3 = DB::table('questions')
        ->select('questions.tokenUser_token','questions.question3')
        ->where('questions.question3','!=','')
        ->orderBy('updated_at','asc')->get();



        return view('login.pytanie3',[
            'pytanie3' => $pytanie3,
        ]);
    }

    public function pytanie4(){
        $tak = DB::table('questions')->where('questions.question4','tak')->count();
        $nie = DB::table('questions')->where('questions.question4','nie')->count();
        $niewiem = DB::table('questions')->where('questions.question4','nie wiem')->count();

        return view('login.pytanie4',[
            'tak' => $tak,
            'nie' => $nie,
            'niewiem' => $niewiem,
        ]);
    }
}
