<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>人材情報編集画面</h1>
    <form action="/worker" method="get">
    @csrf
        <button type="submit">戻る</button>
    </form>
    <form action="/worker_edit" method="post">
        @csrf
        <input type="hidden" name="workers_id" value='{{ $data[0]["workers_id"] ?? ""}}'>
        氏名:<input name="name" type="text" value='{{ $data[0]["name"] ?? "" }}'>
        Email: <input name="email" type="text" value='{{ $data[0]["email"] ?? "" }}'>
        <button type="submit">保存</button>
    </form>
    @if(session("res"))
        <p>{{ session("res") }}</p>

    @endif
</body>

</html>