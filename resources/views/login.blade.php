<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<h1>ログイン画面</h1>
    <form action="" method="post">
        @csrf
        <label for="email">id</label>
        <input type="email" name="email" id="email">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit">送信</button>
    </form>
    <p>{{ $error }}</p>
</body>
</html>