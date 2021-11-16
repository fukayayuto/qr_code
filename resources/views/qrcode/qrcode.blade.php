

<div class="container">
    <div class="col text-center">
        {!! QrCode::generate(route('qr_form')) !!}
     </div>
</div>

<br>

{!! QrCode::generate('https://coubic.com/good-learning/') !!}