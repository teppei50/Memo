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
    background-color: #3490dc; /* ホバー時の色は変更しない */
  }
</style>
@endsection

@section('content')
<div class="container mx-auto py-4">
  <div class="flex justify-center">
    <div class="w-full max-w-lg">
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @endforeach
            </div>
          @endif
          <form action="{{ route('tasks.create', ['id' => $folder_id]) }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                タイトル
              </label>
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" id="title" name="title" type="text" placeholder="タイトルを入力してください" value="{{ old('title') }}">
            </div>
            <div class="form-group">
              <label class="block text-gray-700 text-sm font-bold mt-4" for="due_date">
                期限
              </label>
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('due_date') border-red-500 @enderror" id="due_date" name="due_date" type="text" placeholder="期限を選択してください" value="{{ old('due_date') }}">
            </div>
            <div class="text-right mt-4">
              <button class="btn-submit" type="submit">
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
