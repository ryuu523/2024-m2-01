<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/worker" method="get">
    @csrf
        <button type="submit">戻る</button>
    </form>
    <form action="/worker_register" method="post">
    @csrf
        氏名:<input name="name" type="text">
        Email: <input name="email" type="text">
        password: <input name="password" type="text">
        memo: <input name="memo" type="text">
        <button type="submit">登録</button>
    </form>
    @if(session('res'))
        <div class="alert alert-success">
            {{ session('res') }}
        </div>
    @endif
</body>

</html>
<style>
    p{
        font-size: 3rem;
    }
</style>