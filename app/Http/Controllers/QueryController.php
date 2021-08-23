<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class QueryController extends Controller
{
    public function index(Request $request)
    {
        $dateNow = Carbon::now('Europe/Berlin');
        $dateFinish = '2022-06-25 23:41:00';

       return Carbon::parse($dateNow)->greaterThan($dateFinish) ? view('koniecAnkiety') : view('index');

                //return view('koniecAnkiety');
    }

    public function checkToken(Request $request)
    {
        $token = $request->token;
        $tokens = DB::table('tokenUser')->where('tokenUser.token', $token)->first();

        if (($tokens === null) || ($tokens->status)) {
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
        if ((Session::get('tokenIsgroup') === null) || ($tokens->status)) {
            return view('tokenError', [
                'title' => 'Token nieprawidłowy',
                'worning' => 'Błedny token lub token był już wykozystany'
            ]);
        }


        if (isset($request->checkUser)) {
            Session::put('query1', $request->checkUser);
        }
        if (!empty($request->opisUsers)) {
            Session::put('opisuser1', $request->opisUsers);
        }


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
        if ((Session::get('tokenIsgroup') === null) || ($tokens->status)) {
            return view('tokenError', [
                'title' => 'Token nieprawidłowy',
                'worning' => 'Token nieprawidłowy lub był już wykorzystany.',
                'text' => '',
            ]);
        }

        if (isset($request->checkUser)) {
            Session::put('query2', $request->checkUser);
        }
        if (!empty($request->opisUsers)) {
            Session::put('opisuser2', $request->opisUsers);
        }

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
        if (isset($request->checkUser)) {
            Session::put('query3', $request->checkUser);
        }
        if (!empty($request->opisUsers)) {
            Session::put('opisuser3', $request->opisUsers);
        }
        return view('form4');
    }

    public function changeToken(string $token): void
    {
        if ($token) {
            DB::table('tokenUser')
                ->where('token', $token)
                ->update(array('status' => 1));
        } else {
            Session::flush();
            Session::regenerate();
            view('tokenError', [
                'title' => 'Token nieprawidłowy',
                'worning' => 'Token nieprawidłowy lub był już wykorzystany.',
                'text' => '',
            ]);
        }
    }

    public function ratingIsUser(string $idUser = ""): void
    {
        DB::table('isgroupUsers')->where('isgroupUsers.id', $idUser)->increment('ocena');
    }

    public function saveFeedback(string $checkUser = "", string $feedbackUser = "", string $token): void
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

        $checkUser1 = Session::get('query1') ?: 0;
        $feedbackUser1 = Session::get('opisuser1') ?: '';

        $checkUser2 = Session::get('query2') ?: 0;
        $feedbackUser2 = Session::get('opisuser2') ?: '';

        $checkUser3 = Session::get('query3') ?: 0;
        $feedbackUser3 = Session::get('opisuser3') ?: '';

        $question2 = $request->napoj ?: '';
        $question3 = $request->organizacja ?: '';
        $question4 = $request->workIsgroup ?: '';
        $question5a = $request->imprezaMiejsce ?: '';
        $question5b = $request->imprezaAtrakcje ?: '';
        $question6 = $request->gadzety ?: '';


        // $this->changeToken(Session::get('tokenIsgroup'));
        $this->changeToken($token);

        // if (Session::get('query1')) $this->ratingIsUser(Session::get('query1'));
        if ($checkUser1) $this->ratingIsUser($checkUser1);
        if ($checkUser2) $this->ratingIsUser($checkUser2);
        if ($checkUser3) $this->ratingIsUser($checkUser3);

        // if ($feedbackUser1) $this->saveFeedback($checkUser1, $feedbackUser1, $token);
        // if ($feedbackUser2) $this->saveFeedback($checkUser2, $feedbackUser2, $token);
        // if ($feedbackUser3) $this->saveFeedback($checkUser3, $feedbackUser3, $token);


        DB::table('userfeedbacks')->insert([
            [
                'isgroupUser_id' => $checkUser1,
                'opinion' => $feedbackUser1,
                'tokenUser_token' => $token,
                'updated_at' => Carbon::now(),
            ],
            [
                'isgroupUser_id' => $checkUser2,
                'opinion' => $feedbackUser2,
                'tokenUser_token' => $token,
                'updated_at' => Carbon::now(),
            ],
            [
                'isgroupUser_id' => $checkUser3,
                'opinion' => $feedbackUser3,
                'tokenUser_token' => $token,
                'updated_at' => Carbon::now(),
            ]
        ]);


        DB::table('questions')->insert([
            [
                'question2' => $question2,
                'question3' => $question3,
                'question4' => $question4,
                'question5a' => $question5a,
                'question5b' => $question5b,
                'question6' => $question6,
                'tokenUser_token' => $token,
                'updated_at' => Carbon::now(),
            ],
        ]);

        // dd(Session::get('query1'));

        Session::flush();
        Session::regenerate();

        return view('tokenError', [
            'title' => 'Ankieta wysłana',
            'worning' => 'Dziękujemy za poświęcony czas i wypełnienie ankiety. Wasze opinie i uwagi są dla nas bardzo cenne! ',
            'text' => 'Spośród osób, które wypełnią ankietę wylosujemy na spotkaniu jedną, która otrzyma prezent.',
        ]);
    }
}
