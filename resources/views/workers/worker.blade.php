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
    <h1>人材情報管理ページ</h1>
    <form action="worker_register" method="get">
        <button class="btn" type="submit">人材情報新規登録</button>
    </form>
    @if(session('res'))
        <div class="alert alert-success">
            {{ session('res') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>人材ID</th>
                <th>氏名</th>
                <th>メールアドレス</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i < count($data);$i++) <tr>
                <td>{{ $data[$i]["workers_id"] }}</td>
                <td>{{ $data[$i]["name"] }}</td>
                <td>{{ $data[$i]["email"] }}</td>
                <td>
                    <form action="worker_edit" method="get">
                    @csrf
                    <input type="hidden" name="workers_id" value='{{ $data[$i]["workers_id"] }}'>
                        <button type="submit">編集</button>
                    </form>
                </td>
                <td>
                    <form action="/worker_delete" method="post">
                        @csrf
                    <input type="hidden" name="workers_id" value='{{ $data[$i]["workers_id"] }}'>
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