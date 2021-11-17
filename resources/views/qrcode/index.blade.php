<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    <title>form</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
　　 <title>e_leaning</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron mt-3">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li id="err">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        　　@endif

            <h3>入力フォーム</h3>
            <form method="POST" action="{{route('check_list')}}" id="form">
                @csrf
                <div class="form-group">
                    <label>会社名<span class="badge badge-danger">必須</span></label>
                    <input type="text" class="form-control" id="company_name" placeholder="会社名" name="company_name" required>
                </div>

                <div class="form-group">
                    <label>氏名<span class="badge badge-danger">必須</span></label>
                    <input type="text" class="form-control" id="name" placeholder="氏名" name="name" required>
                </div>

                <div class="form-group">
                    <label>氏名カナ<span class="badge badge-danger">必須</span></label>
                    <input type="text" class="form-control" id="name_kana" placeholder="氏名カナ" name="name_kana" required>
                    <small id="emailHelp" class="form-text text-muted">全角カタカナで入力ください</small>
                </div>

                <div class="form-group">
                    <label>メールアドレス<span class="badge badge-danger">必須</span></label>
                    <input type="email" class="form-control" id="email" placeholder="メールアドレス" name="email" required>
                </div>

                <div class="form-group">
                    <label>希望参加日</label>
                    <select name="select_date" id="select_date" class="form-control">
                        <option value="1">１１月３０日（火）１３：００～１４：３０</option>
                        <option value="2">１２月１日（水）１５：３０～１７：００</option>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary" id="btnSubmit">確認画面へ</button>
            </form>
    　　　</div>
　　　</div>
    
</body>
</html>