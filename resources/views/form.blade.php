<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
　　　<title>learning</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

    @if (!empty($user_id))
       {{user_id}}
        
    @endif

    <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">アカウント情報登録</div>
          <div class="panel-body">
            <form action="{{ route('account_create')}}" method="POST">
            {{-- <form action="#" method="POST"> --}}
                {{ csrf_field() }}
                <div class="form-group">
                <label class="control-label">名字 {{user_id}}<span class="badge badge-danger">Required</span></label>
                <input class="form-control" type="text" name="family_name">
              </div>
              <div class="form-group">
                <label class="control-label">名前 <span class="badge badge-danger">Required</span></label>
                <input class="form-control" type="text" name="first_name">
              </div>
              <div class="form-group">
                <label class="control-label">e-mail <span class="badge badge-danger">Required</span></label>
                <input class="form-control" type="email" name="email">
              </div>
              <div class="form-group">
                <label class="control-label">会社名 <span class="badge badge-danger">Required</span></label>
                <input class="form-control" type="text" name="company_name">
              </div>
              <div class="form-group">
                <label class="control-label">営業所名</label>
                <input class="form-control" type="text" name="sales_office">
              </div>
              <div class="form-group">
                <label class="control-label">電話番号 <span class="badge badge-danger">Required</span></label>
                <input class="form-control" type="phone" name="phone">
              </div>
              
              <button class="btn btn-primary">登録</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>