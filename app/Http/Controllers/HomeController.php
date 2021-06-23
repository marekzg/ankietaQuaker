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

    public function pytanie5(){
        $pytanie5 = DB::table('questions')
        ->select('questions.question5a','questions.question5b')
        ->where('questions.question5a','!=','')
        ->orwhere('questions.question5b','!=','')
        ->orderBy('updated_at','asc')->get();

        return view('login.pytanie5',[
            'pytanie5' => $pytanie5
        ]);
    }

    public function pytanie6(){
        $pytanie6 = DB::table('questions')
        ->select('questions.question6')
        ->where('questions.question6','!=','')
        ->orderBy('updated_at','asc')->get();

        return view('login.pytanie6',[
            'pytanie6' => $pytanie6,
        ]);
    }

    public function opinions(){
        // $Users = DB::table('isgroupUsers')->select('isgroupUsers.id', 'isgroupUsers.imie')->get();


        $Users = DB::table('isgroupUsers')
        ->rightJoin('userfeedbacks','isgroupUsers.id','=','userfeedbacks.isgroupUser_id')
        ->whereColumn('isgroupUsers.id','userfeedbacks.isgroupUser_id')
        ->distinct()
        ->select('isgroupUsers.id','isgroupUsers.imie')->orderBy('isgroupUsers.id','asc')->get();

        // $Users = DB::table('userfeedbacks')
        // ->join('isgroupUsers','userfeedbacks.isgroupUser_id','=','isgroupUsers.id')
        // ->select('isgroupUsers.id','isgroupUsers.imie','userfeedbacks.opinion')->get();


        return view('login.opinions',[
            'Users' => $Users,
        ]);
    }

    public function showOpinion(int $idUser){
        $opinionUser = DB::table('userfeedbacks')
        ->where('userfeedbacks.isgroupUser_id',$idUser)
        ->join('isgroupUsers','userfeedbacks.isgroupUser_id','=','isgroupUsers.id')
        ->select('isgroupUsers.imie','userfeedbacks.opinion')->get();

        $imieNazwisko = DB::table('isgroupUsers')
        ->where('isgroupUsers.id',$idUser)
        ->select('isgroupUsers.imie')->first();

        // dd($opinionUser);

        return view('login.showOpinion',[
            'opinionUser' => $opinionUser,
            'imieNazwisko' => $imieNazwisko,
        ]);
    }
}
