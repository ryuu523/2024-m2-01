<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>イベント情報編集画面</h1>
    <form action="/event" method="get">
    @csrf
        <button type="submit">戻る</button>
    </form>
    <form action="/event_edit" method="post">
        @csrf
        <input type="hidden" name="findid" value='{{ $data[0]["events_id"] ?? ""}}'>
        イベント名:<input name="name" type="text" value='{{ $data[0]["name"] ?? "" }}'>
        開催場所: <input name="place" type="text" value='{{ $data[0]["place"] ?? "" }}'>
        開催日: <input name="date" type="date" value='{{ $data[0]["date"] ?? "" }}'>


        <button type="submit">保存</button>
    </form>
    <p>{{ $res ?? "" }}</p>
</body>

</html>