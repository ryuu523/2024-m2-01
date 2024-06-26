<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>event</title>
</head>

<body>
    <form action="menu" method="get">
    @csrf
        <button  type="submit">戻る</button>
    </form>
    <h1>イベント情報管理ページ</h1>
    <form action="event_register" method="get">
        <button class="btn" type="submit">イベント情報新規登録</button>
    </form>
    @if(session('res'))
        <div class="alert alert-success">
            {{ session('res') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>イベントID</th>
                <th>イベント名</th>
                <th>開催場所</th>
                <th>開催日時</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i < count($data);$i++) <tr>
                <td>{{ $data[$i]["events_id"] }}</td>
                <td>{{ $data[$i]["name"] }}</td>
                <td>{{ $data[$i]["place"] }}</td>
                <td>{{ $data[$i]["date"] }}</td>
                <td>
                    <form action="event_edit" method="get">
                    @csrf
                    <input type="hidden" name="num" value='{{ $data[$i]["events_id"] }}'>
                        <button type="submit">編集</button>
                    </form>
                </td>
                <td>
                    <form action="/event_delete" method="post">
                        @csrf
                    <input type="hidden" name="events_id" value='{{ $data[$i]["events_id"] }}'>
                        <button onClick="return del()" type="submit">削除</button>
                    </form>
                </td>
                </tr>
                @endfor

        </tbody>
    </table>

</html>
<style>
    .btn {
        position: fixed;
        top: 0;
        right: 0;
        font-size: 1rem;
    }

    table,
    tr,
    td,
    th {
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>
<script>
    const del=()=>{
        let check=window.confirm("削除してもよろしいですか？")
        return check
        
    }
</script>