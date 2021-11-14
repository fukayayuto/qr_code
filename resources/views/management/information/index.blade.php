<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面</title>
</head>

<body>

    <a href="/management/index"><button>管理画面一覧に戻る</button></a>

    <div class="container">
        <form action="{{ route('information_store') }}" method="post">
            @csrf
            <textarea name="link" id="link" cols="50" rows="3" placeholder="URL"></textarea>
            <textarea name="title" id="title" cols="50" rows="3" placeholder="TITLE"></textarea>
            <button class="submit">新規登録</button>
        </form>
    </div>

    <br>

    <div class="container">
        <table class="table">
            <thead>
                <tr class="success">
                    <td>ID</td>
                    <td>URL</td>
                    <td>タイトル</td>
                    <td>作成日時</td>
                    <td>更新日時</td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                @if (!empty($data))
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td> <a href="{{ $item->link }}">{{ $item->link }}</a></td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td><a href="/management/information/detail/{{ $item->id }}"><button>編集</button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</body>

</html>
