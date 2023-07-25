@extends('layout')

@section('content')
<div class="container mx-auto mt-8">
  <div class="w-full max-w-md mx-auto">
    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <h2 class="text-center text-2xl font-bold mb-4 text-white">まずはフォルダを作成しましょう</h2>
      <div class="text-center">
        <a href="{{ route('folders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          フォルダ作成ページへ
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
