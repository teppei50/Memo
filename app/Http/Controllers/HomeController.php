<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        // ログインしている場合のみフォルダ情報を取得する
        if (Auth::check()) {
            // ログインユーザーを取得する
            $user = Auth::user();

            // ログインユーザーに紐づくフォルダを一つ取得する
            $folder = $user->folders()->first();

            // まだ一つもフォルダを作っていなければホームページをレスポンスする
            if (is_null($folder)) {
                return view('home');
            }

            // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
            return redirect()->route('tasks.index', ['folder' => $folder->id]);
        }

        // ログインしていない場合はログインページにリダイレクトする
        return Redirect::route('login');
    }
}
