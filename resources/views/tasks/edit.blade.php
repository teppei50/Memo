@extends('layout')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
<style>
  /* 新たに追加したスタイル */
  .btn-submit {
    background-color: #3490dc;
    color: #fff;
    font-weight: bold;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    outline: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-submit:hover {
    background-color: #2779bd;
  }
</style>
@endsection

@section('content')
<div class="container mx-auto py-4">
  <div class="flex justify-center">
    <div class="w-full max-w-lg">
      <div class="bg-gray-200 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @endforeach
            </div>
          @endif
          <form action="{{ route('tasks.edit', ['id' => $todo->folder_id, 'task_id' => $todo->id]) }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                タイトル
              </label>
              <input class="appearance-none bg-white border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" id="title" name="title" type="text" placeholder="タイトルを入力してください" value="{{ old('title') ?? $todo->title }}">
            </div>
            <div class="form-group">
              <label class="block text-gray-700 text-sm font-bold mt-4" for="status">
                状態
              </label>
              <select name="status" id="status" class="form-select block w-full mt-1 @error('status') border-red-500 @enderror">
                @foreach(\App\Models\Todo::STATUS as $key => $val)
                  <option value="{{ $key }}" {{ $key == old('status', $todo->status) ? 'selected' : '' }}>
                    {{ $val['label'] }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="block text-gray-700 text-sm font-bold mt-4" for="due_date">
                期限
              </label>
              <input class="appearance-none bg-white border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('due_date') border-red-500 @enderror" id="due_date" name="due_date" type="text" placeholder="期限を選択してください" value="{{ old('due_date', $todo->formatted_due_date) }}" />
            </div>
            <div class="text-right mt-4">
                <button class="btn-submit bg-blue-500" type="submit">
                     送信
                </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
  flatpickr(document.getElementById('due_date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date() // 修正：minDateを現在の日付に設定
  });
</script>
@endsection
