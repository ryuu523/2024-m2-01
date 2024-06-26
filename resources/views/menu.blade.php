<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
</head>

<body>
    {{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。

    <form action="{{route('user.logout')}}" method="post">
        @csrf
        <button>ログアウト</button>
    </form>
    <ul>
        <li><a href="/event">イベント情報管理</a></li>
        <li><a href="/worker">人材情報管理</a></li>
        <li><a href="/dispatche">派遣情報管理</a></li>
    </ul>

</body>

</html>