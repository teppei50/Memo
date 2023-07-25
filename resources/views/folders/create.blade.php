@extends('layout')

@section('content')
<div class="container mx-auto mt-8">
  <div class="w-full max-w-md mx-auto">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <h2 class="text-center text-2xl font-bold mb-4">フォルダを追加する</h2>
      @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
          @endforeach
        </div>
      @endif
      <form action="{{ route('folders.create') }}" method="post">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            フォルダ名
          </label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" id="title" name="title" type="text" placeholder="フォルダ名を入力してください" value="{{ old('title') }}">
        </div>
        <div class="flex items-center justify-end">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            送信
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
