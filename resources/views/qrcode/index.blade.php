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

    <title>form</title>
</head>
<body>
    <div class="container">

        <form method="POST" action="{{route('check_list')}}">
            @csrf
            <div class="form-group">
                <label>氏名</label>
                <input type="text" class="form-control" id="name" placeholder="氏名" name="name" required>
            </div>

            <div class="form-group">
                <label>メールアドレス</label>
                <input type="email" class="form-control" id="email" placeholder="メールアドレス" name="email" required>
            </div>
            <div class="form-group">
                <label>会社名</label>
                <input type="text" class="form-control" id="company_name" placeholder="会社名" name="company_name">
            </div>
            <div class="form-group">
                <label>選択項目</label>
                <select name="select" id="select" class="form-control" >
                    <option value="A">A講座</option>
                    <option value="B">B講座</option>
                    <option value="C">C講座</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">確認画面へ</button>
        </form>
    </div>
</body>
</html>