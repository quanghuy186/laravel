<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/product" method="POST">
        @csrf
        <label for="">Mô tả sản phẩm </label>
        <input type="text" name="productDescription">

        <label for="">Gía niêm yết</label>
        <input type="text" name="price">

        <label for="">Tỷ lệ chiết khấu</label>
        <input type="text" name="discountPercent">

        <button type="submit">CALC</button>
    </form>
</body>
</html>