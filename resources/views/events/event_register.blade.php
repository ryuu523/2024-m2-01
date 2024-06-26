<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/event" method="get">
    @csrf
        <button type="submit">戻る</button>
    </form>
    <form action="/event_register" method="post">
    @csrf
        イベント名:<input name="name" type="text">
        開催場所: <input name="place" type="text">
        開催日: <input name="date" type="date">
    

        <button type="submit">登録</button>
    </form>
    <p>{{ $res ?? "" }}</p>
</body>

</html>
<style>
    p{
        font-size: 3rem;
    }
</style>