<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  @yield('styles')
  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <header class="bg-gray-700 text-white py-4">
    <div class="container mx-auto flex items-center justify-between px-4">
      <a class="text-xl font-bold" href="/">ToDo App</a>
      <div class="flex items-center">
        @if(Auth::check())
          <span class="mr-4">ようこそ、{{ Auth::user()->name }}さん</span>
          <a href="#" id="logout" class="ml-4">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <a class="mr-4" href="{{ route('login') }}">ログイン</a>
          <a href="{{ route('register') }}">会員登録</a>
        @endif
      </div>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
  @if(Auth::check())
    <script>
      document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
      });
    </script>
  @endif
  @yield('scripts')
</body>
</html>
