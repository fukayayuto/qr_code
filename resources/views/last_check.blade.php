<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  @if (!empty(Auth::id()))
      会員用
  @else
      非会員用
  @endif

 
  @if (!empty(Auth::id()))
  family_name:{{$user['family_name']}}<br>
  first_name:{{$user['first_name']}}<br>
  email:{{$user['email']}}<br>
  company_name:{{$user['company_name']}}<br>

  @if ($user['sales_office'])
  sales_office:{{$user['sales_office']}}<br>
  @endif
  phone:{{$user['phone']}}<br>

  reservation_date:{{$data['reservation_date']}}<br>

  count:{{$data['count']}}<br>

 

  @else

  family_name:{{$data['family_name']}}<br>
  first_name:{{$data['first_name']}}<br>
  email:{{$data['email']}}<br>
  company_name:{{$data['company_name']}}<br>

  @if ($data['sales_office'])
  sales_office:{{$data['sales_office']}}<br>
  @endif
  phone:{{$data['phone']}}<br>

  reservation_date:{{$data['reservation_date']}}<br>

  count:{{$data['count']}}<br>

  @endif

    

<form action="/reservation/register" method="POST">
    {{ csrf_field() }}


@if (!empty(Auth::id()))
<input type="hidden" name="first_name" value="{{$user['first_name']}}">
<input type="hidden" name="family_name" value="{{$user['family_name']}}">
<input type="hidden" name="email" value="{{$user['email']}}">
<input type="hidden" name="company_name" value="{{$user['company_name']}}">
@if ($user['sales_office'])
<input type="hidden" name="sales_office" value="{{$user['sales_office']}}">
@endif
<input type="hidden" name="phone" value="{{$user['phone']}}">


@else
<input type="hidden" name="first_name" value="{{$data['first_name']}}">
<input type="hidden" name="family_name" value="{{$data['family_name']}}">
<input type="hidden" name="email" value="{{$data['email']}}">
<input type="hidden" name="company_name" value="{{$data['company_name']}}">
@if ($data['sales_office'])
<input type="hidden" name="sales_office" value="{{$data['sales_office']}}">
@endif
<input type="hidden" name="phone" value="{{$data['phone']}}">
@endif
    

<input type="hidden" name="reservation_date" value="{{$data['reservation_date']}}">
<input type="hidden" name="count" value="{{$data['count']}}">

<button class="btn btn-primary">登録</button>

</form>
    

</body>
</html>