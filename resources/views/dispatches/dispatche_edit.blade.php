<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>派遣情報編集画面</h1>
    <form action="/dispatche" method="get">
        @csrf
        <button type="submit">戻る</button>
    </form>
    <form action="/dispatche_edit" method="post">
        @csrf
        <input type="hidden" name="find_events_id" value='{{ $data[0]["events_id"] ?? ""}}'>
        <input type="hidden" name="find_workers_id" value='{{ $data[0]["workers_id"] ?? ""}}'>
        イベント情報: <select name="events_id">
            @for ($i=0 ; $i < count($event) ; $i++) <option value="{{ $event[$i]['events_id']}}" {{ $se_e_num == ($i+1) ? "selected" : "" }}>{{ $event[$i]["name"]}}</option>
                @endfor
        </select>
        人材情報: <select name="workers_id">
            @for ($i=0 ; $i < count($worker) ; $i++) <option value="{{ $worker[$i]['workers_id']}}" {{ $se_wo_num == ($i+1) ? "selected" : "" }}>{{ $worker[$i]["name"] }}</option>
                @endfor
        </select>

        <button type="submit">保存</button>
    </form>
    @if(session("res"))
    <p>{{ session("res") }}</p>

    @endif
</body>

</html>