<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Todo; // モデル名を "Todo" に修正
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $folders = Auth::user()->folders()->get();

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);

        if (is_null($current_folder)) {
            abort(404);
        }
        // 選ばれたフォルダに紐づくタスク（todos）を取得する
        $todos = $current_folder->todos; // ★

        return view('tasks.index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'todos' => $todos, // ★
            'folder_id' => $id, // 追加：$folder_idを定義

        ]);
    }
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Todo(); // Todo モデルを利用する場合、Task を Todo に変更する
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->todos()->save($task); // tasks() を todos() に変更する

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ]);
    }

    public function showEditForm(int $id, int $task_id)
    {
        // 1
        $task = Todo::find($task_id);

        // レコードが見つからなかった場合の処理
        if (!$task) {
            abort(404); // 404エラーを返すなど適切な処理を行ってください
        }

        // 2
        return view('tasks.edit', [
            'todo' => $task,
        ]);
    }

    public function edit(int $id, int $task_id, \Illuminate\Http\Request $request)
    {
        // 1
        $task = Todo::find($task_id); // Task を Todo に修正

        // レコードが見つからなかった場合の処理
        if (!$task) {
            abort(404); // 404エラーを返すなど適切な処理を行ってください
        }

        // 2
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        // 3
        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }

}
