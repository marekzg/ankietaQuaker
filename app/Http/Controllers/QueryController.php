<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if ($tokens === null) {
            return view('tokenError');
        }
        if ($tokens->status) {
            return view('tokenError');
        } else {
            $tokensAll = DB::table('tokenUser')->select('tokenUser.token', 'tokenUser.status')->get();

            return view('form', [
                'tokens' => $tokensAll,
            ]);
        }
    }
}
