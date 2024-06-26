<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="dispatche" method="get">
        @csrf
        <button type="submit">戻る</button>
    </form>
    <form action="/dispatche_register" method="post">
        @csrf
        イベント情報: <select name="events_id" id="">
            @for ($i=0 ; $i < count($event) ; $i++) <option value="{{ $event[$i]['events_id']}}">{{ $event[$i]["name"]}}</option>
                @endfor
        </select>
        人材情報: <select name="workers_id[]" multiple>
            @for ($i=0 ; $i < count($worker) ; $i++) <option value="{{ $worker[$i]['workers_id']}}">{{ $worker[$i]["name"] }}</option>
                @endfor
        </select>


        <button type="submit">登録</button>
    </form>
    @if(session('res'))
    {{print_r(session("res"))}}
    @endif
</body>

</html>