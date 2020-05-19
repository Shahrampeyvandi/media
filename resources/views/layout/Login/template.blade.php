<!doctype html>
<html lang="en">

<head>
  <title>
    ژن برتر - ورود
</title>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/FontAwesome/all.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/mdb.min.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/Panel/vendor/bootstrap/RTL.css">
    <link rel="stylesheet" href="{{route('BaseUrl')}}/assets/css/login.css">
     @yield('css')
</head>

<body style="direction: rtl;text-align: right;height:100vh;" class="aqua-gradient">
  <div class="container">
    @yield('content')
  </div>
  <script src="{{route('BaseUrl')}}/Panel/vendor/jquery/jquery-3.4.1.js"></script>
  <script src="{{route('BaseUrl')}}/Panel/assets/js/jquery.validate.js"></script>
    @yield('js')
    <script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
    </script>
</body>

</html>
