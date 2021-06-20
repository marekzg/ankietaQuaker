<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function ratingIsUser(string $idUser = ""): void
    {
        DB::table('isgroupUsers')->where('isgroupUsers.id', $idUser)->increment('ocena');
    }

    public function saveFeedback(string $checkUser = "", string $feedbackUser = "", string $token)
    {
        DB::table('userfeedbacks')->insert([
            'isgroupUser_id' => $checkUser,
            'opinion' => $feedbackUser,
            'tokenUser_token' => $token,
            'updated_at' => Carbon::now(),
        ]);
    }



    public function queryForm(Request $request): view
    {


            // $this->tokenGlobl,
            $token = Session::get('tokenIsgroup') ?: '';

            $checkUser1  = Session::get('query1') ?: '';
            $feedbackUser1 = Session::get('opisuser1') ?: '';

            $checkUser2  = Session::get('query2') ?: '';
            $feedbackUser2 = Session::get('opisuser2') ?: '';

            $checkUser3  = Session::get('query3') ?: '';
            $feedbackUser3 = Session::get('opisuser3') ?: '';

            $question1 = $request->napoj ?: '';
            $question2 = $request->organizacja ?: '';
            $question3 = $request->workIsgroup ?: '';
            $question4a = $request->imprezaMiejsce ?: '';
            $question4b = $request->imprezaAtrakcje ?: '';
            $question5 = $request->gadzety ?: '';


        // $this->changeToken(Session::get('tokenIsgroup'));
        $this->changeToken($token);

        // if (Session::get('query1')) $this->ratingIsUser(Session::get('query1'));
        if ($checkUser1) $this->ratingIsUser($checkUser1);
        if ($checkUser2) $this->ratingIsUser($checkUser2);
        if ($checkUser3) $this->ratingIsUser($checkUser3);

        if ($feedbackUser1) $this->saveFeedback($checkUser1, $feedbackUser1, $token);
        if ($feedbackUser2) $this->saveFeedback($checkUser2, $feedbackUser2, $token);
        if ($feedbackUser3) $this->saveFeedback($checkUser3, $feedbackUser3, $token);




        // DB::table('userfeedbacks')->insert([
        //     [
        //         'isgroupUser_id' => $tabQues['checkUser1'],
        //         'opinion' => $tabQues['feedbackUser1'],
        //         'tokenUser_token' => $tabQues['token'],
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'isgroupUser_id' => $tabQues['checkUser2'],
        //         'opinion' => $tabQues['feedbackUser2'],
        //         'tokenUser_token' => $tabQues['token'],
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'isgroupUser_id' => $tabQues['checkUser3'],
        //         'opinion' => $tabQues['feedbackUser3'],
        //         'tokenUser_token' => $tabQues['token'],
        //         'updated_at' => Carbon::now(),
        //     ]
        // ]);

        // dd(Session::get('query1'));

        Session::flush();
        Session::regenerate();

        return view('tokenError', [
            'title' => 'Ankieta wysłana ;)',
            'worning' => 'Dziękujemy za poświęcony czas i wypełnienie ankiety. Wasze opinie i uwagi są dla nas bardzo cenne! '
        ]);
    }
}
