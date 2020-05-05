<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>genebartar</title>
	<style>
	body{
	position:absolute;
	
	 width:50%;
	
	
	}

	div {
	text-align:center;
	width: 50%;
  border-style: solid;
  border-color: #92a8d1;
}

.header1{
background:black;
color:white;
}
	</style>
</head>
<body dir="rtl">
<div>
<img src="https://genebartar.ir/assets/images/logo.jpeg">
    <h3 class="text-primary header1">کاربر عزیز ژن برتر! برای بازیابی رمزعبور روی لینک زیر کلیک کنید</h3>

	<!-- <form action="{{ route('forgot.resetpass') }}" method="get">
	<input type="hidden" name="token" value="{{$token}}">
    <input type="email" name="email" value="$email">
    <input type="submit" value="بازیابی رمز عبور"> -->
	<a href="{{ route('forgot.resetpass') }}?token={{$token}}">بازیابی رمز غبور</a>
    </div>
</body>
</html>