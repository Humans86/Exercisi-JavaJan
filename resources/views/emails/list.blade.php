<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Series confirmades</title>
</head>
<body>
    <p> Hi, les series confirmades correctament sòn:</p>
    <br><br>
    <table style="width: 600px; text-align:right">
        <li> {{$info->title}}</li>
        <li> {{$info->url}}</li>
        <li> {{$info->content}}</li>
        <li> {{$info->image}}</li>
        <li> {{$info->category_id}}</li>
    </table>    
</body>
</html>