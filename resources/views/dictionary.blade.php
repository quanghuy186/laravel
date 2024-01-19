<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/dictionary" method="POST">
        @csrf
        <input name="word" type="word" placeholder="Nhập từ cần dịch">

        <button type="submit">Dịch</button>
    </form>

    <?php
        echo "Nghĩa của từ đó là " . $value;
    ?>
</body>
</html>