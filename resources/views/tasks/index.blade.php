@extends('layout')

@section('content')
<div class="container mx-auto py-4">
  <div class="flex flex-wrap -mx-2">
    <div class="w-full md:w-1/4 px-2">
      <nav class="panel panel-default">
        <div class="panel-heading text-white bg-gray-700">フォルダ</div>
        <div class="panel-body">
          <a href="{{ route('folders.create') }}" class="btn btn-default btn-block bg-gray-200 hover:bg-gray-300">
            フォルダを追加する
          </a>
        </div>
        <div class="list-group">
          @foreach($folders as $folder)
          <a href="{{ route('tasks.index', ['folder' => $folder->id]) }}" class="list-group-item block px-4 py-3 text-gray-800 hover:bg-gray-100">
             {{ $folder->title }}
          </a>
          @endforeach
        </div>
      </nav>
    </div>
    <div class="w-full md:w-3/4 px-2">
      <div class="panel panel-default">
        <div class="panel-heading">タスク</div>
        <div class="panel-body">
          <div class="text-right mb-4">
          <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              タスクを追加する
            </a>
          </div>
        </div>
        <table class="table border-collapse w-full">
          <thead>
            <tr>
              <th class="border bg-gray-100 px-4 py-2">タイトル</th>
              <th class="border bg-gray-100 px-4 py-2">状態</th>
              <th class="border bg-gray-100 px-4 py-2">期限</th>
              <th class="border bg-gray-100 px-4 py-2"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($todos as $task) <!-- $tasks を $todos に変更 -->
              <tr>
                <td class="border px-4 py-2">{{ $task->title }}</td>
                <td class="border px-4 py-2">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($task->status_class) {{ $task->status_class }} @endif">{{ $task->status_label }}</span>
                </td>
                <td class="border px-4 py-2">{{ $task->formatted_due_date }}</td>
                <td class="border px-4 py-2"><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}" class="text-blue-500 hover:text-blue-700">編集</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
