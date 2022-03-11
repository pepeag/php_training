<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Data</title>
</head>
<body>
    <h1>Your Registeration was saved successfully.</h1>
    <p>Your Name :&nbsp; {{ $datas['name'] }}</p>
    <p>Your email :&nbsp; {{ $datas['email'] }}.</p>
    <p>Your Date Of Birth :&nbsp; {{$datas['date_of_birth']}}</p>
    <p>Your Address : &nbsp; {{$datas['address']}}</p>
</body>
</html>

