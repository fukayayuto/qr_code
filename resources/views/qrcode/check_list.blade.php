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
         <div class="mt-3">
            <h3>確認画面</h3>
            <br>

            <form method="POST" action="{{route('store')}}" id="form">
                @csrf
                <input type="hidden" name="name" id="name" value="{{$data['name']}}">
                <input type="hidden" name="name_kana" id="name_kana" value="{{$data['name_kana']}}">
                <input type="hidden" name="email" id="email" value="{{$data['email']}}">
                <input type="hidden" name="company_name" id="company_name" value="{{$data['company_name']}}">
                <input type="hidden" name="select" id="select" value="{{$data['select']}}">


                <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th scope="row">会社名</th>
                        <td>{{$data['company_name']}}</td>
                      </tr>
                      <tr>
                        <th scope="row">氏名</th>
                        <td>{{$data['name']}}</td>
                      </tr>
                      <tr>
                        <th scope="row">氏名カナ</th>
                        <td>{{$data['name_kana']}}</td>
                      </tr>
                      <tr>
                        <th scope="row">メールアドレス</th>
                        <td>{{$data['email']}}</td>
                      </tr>
                      <tr>
                        <th scope="row">希望参加日</th>
                        <td>{{$data['select_date']}}</td>
                      </tr>
                    </tbody>
                  </table>
                
                <button type="submit" class="btn btn-primary" id="btnSubmit">送信</button>
            </form>
        </div>
    </div>

    <script>
        //判定用フラグ
        var isSubmit = false;

        document.getElementById('form').onsubmit = function() {
            var obj = document.getElementById("btnSubmit");
        if(obj.disabled){
            //ボタンがdisabledならsubmitしない
            return false;
        }else{
            //ボタンがdisabledでなければ、ボタンをdisabledにした上でsubmitする
            obj.disabled = true;
            return true;
        }

        }
         
        </script>
</body>
</html>