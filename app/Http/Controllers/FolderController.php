<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders.create');
    }

    public function create(Request $request)
    {
        // フォルダを作成する際にログインしているユーザーのIDを設定
        $folder = new Folder([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id
        ]);
        $folder->save();

        return redirect()->route('home');
    }

}
