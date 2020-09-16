<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>@yield('title')</title>
</head>
<body>
@include('index.public.head')
@section('subject')
    
@show
@include('index/public.foot')
</body>
</html>
