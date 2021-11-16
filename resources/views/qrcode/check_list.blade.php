<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>確認画面</title>
</head>
<body>
    <div class="container">

        <form method="POST" action="{{route('store')}}">
            @csrf
            <input type="hidden" name="name" id="name" value="{{$data['name']}}">
            <input type="hidden" name="email" id="email" value="{{$data['email']}}">
            <input type="hidden" name="company_name" id="company_name" value="{{$data['company_name']}}">
            <input type="hidden" name="select" id="select" value="{{$data['select']}}">

            <div class="form-group">
                <label>氏名</label>
                <label for="name">{{$data['name']}}</label>
            </div>

            <div class="form-group">
                <label>メールアドレス</label>
                <label for="email">{{$data['email']}}</label>
            </div>
            <div class="form-group">
                <label>会社名</label>
                <label for="company_name">{{$data['company_name']}}</label>
            </div>
            <div class="form-group">
                <label>選択項目</label>
                <label for="select">{{$data['select']}}</label>
            </div>
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>
</body>
</html>