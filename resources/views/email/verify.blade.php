<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<h1>Hello {{$user->name}} </h1>

<p>TO Verfir your email please click the link</p>
<hr>

<a href="{{route('user.verify',$user->verifyuser->token)}}">Verfiy Your Email</a>

</body>
</html>