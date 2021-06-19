<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class QueryController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }
    public function checkToken(Request $request)
    {
        $token = $request->token;
        $tokens = DB::table('tokenUser')->where('tokenUser.token', $token)->first();

        if (($tokens === null) or ($tokens->status)) {
            return view('tokenError', [
                'title' => 'Token nieprawidłowy',
                'worning' => 'Błedny token lub token był już wykozystany'
            ]);
        } else {
            Session::put('tokenIsgroup', $token);

            $allUsers = DB::table('isgroupUsers')->select('isgroupUsers.id', 'isgroupUsers.imie', 'isgroupUsers.foto')->get();

            return view('form1', [
                'allUsers' => $allUsers,
            ]);
        }
    }


    public function query1(Request $request): view
    {
        $token = Session::get('tokenIsgroup');
        $tokens = DB::table('tokenUser')->where('tokenUser.token', $token)->first();
        if ((Session::get('tokenIsgroup') === null) or ($tokens->status)) {
            return view('tokenError', [
                'title' => 'Token nieprawidłowy',
                'worning' => 'Błedny token lub token był już wykozystany'
            ]);
        }


        Session::put('query1', $request->checkUser);
        Session::put('opisuser1', $request->opisUsers);


        $allUsers = DB::table('isgroupUsers')->select('isgroupUsers.id', 'isgroupUsers.imie', 'isgroupUsers.foto')->get();



        return view('form2', [
            'allUsers' => $allUsers,
            'query1' => Session::get('query1'),
        ]);
    }

    public function query2(Request $request): view
    {
        $token = Session::get('tokenIsgroup');
        $tokens = DB::table('tokenUser')->where('tokenUser.token', $token)->first();
        if ((Session::get('tokenIsgroup') === null) or ($tokens->status)) {
            return view('tokenError', [
                'title' => 'Token nieprawidłowy',
                'worning' => 'Błedny token lub token był już wykozystany'
            ]);
        }



        Session::put('query2', $request->checkUser);
        Session::put('opisuser2', $request->opisUsers);



        $allUsers = DB::table('isgroupUsers')->select('isgroupUsers.id', 'isgroupUsers.imie', 'isgroupUsers.foto')->get();

        // return view('form2', [
        //     'allUsers' => $allUsers,
        // ]);
        return view('form3', [
            'allUsers' => $allUsers,
            'query1' => Session::get('query1'),
            'query2' => Session::get('query2'),
        ]);
    }

    public function query3(Request $request): view
    {
        Session::put('query3', $request->checkUser);
        Session::put('opisuser3', $request->opisUsers);

        return view('form4');
    }

    public function changeToken(String $token): void
    {
        DB::table('tokenUser')
            ->where('token', $token)
            ->update(array('status' => 1));
    }

    public function ratingIsUser(string $idUser=""): void
    {
                    $user = DB::table('isgroupUsers')->where('isgroupUsers.id', $idUser)->increment('ocena');
    }


    public function queryForm(Request $request): view
    {
        // $token = Session::get('tokenIsgroup');
        // $query1  = Session::get('query1');
        // $opisUser1 = Session::get('opisuser1');
        // $query2  = Session::get('query2');
        // $opisUser2 = Session::get('opisuser2');
        // $query3  = Session::get('query3');
        // $opisUser3 = Session::get('opisuser3');

        $tabelUsers = [
            // $this->tokenGlobl,
            $token = Session::get('tokenIsgroup'),
            $query1  = Session::get('query1'),
            $opisUser1 = Session::get('opisuser1'),
            $query2  = Session::get('query2'),
            $opisUser2 = Session::get('opisuser2'),
            $query3  = Session::get('query3'),
            $opisUser3 = Session::get('opisuser3'),
            $request->napoj,
            $request->organizacja,
            $request->workIsgroup,
            $request->imprezaMiejsce,
            $request->imprezaAtrakcje,
            $request->gadzety,
        ];

        $this->changeToken(Session::get('tokenIsgroup'));

        if(Session::get('query1')) $this->ratingIsUser(Session::get('query1'));
        if(Session::get('query2')) $this->ratingIsUser(Session::get('query2'));
        if(Session::get('query3')) $this->ratingIsUser(Session::get('query3'));
        // $this->ratingIsUser(Session::get('query2'));
        // $this->ratingIsUser(Session::get('query3'));

        // dd(Session::get('query1'));

        Session::flush();
        Session::regenerate();

        return view('tokenError', [
            'title' => 'Ankieta wysłana ;)',
            'worning' => 'Dziękujemy za poświęcony czas i wypełnienie ankiety. Wasze opinie i uwagi są dla nas bardzo cenne! '
        ]);
    }
}
