<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF de Categories</title>

    <link rel="stylesheet" href="{{public_path ("css/app.css") }}">

</head>
<body>
   
<h2>Llistat de Categories </h2>
    <table class="table">
        <thead>
            <tr>
              
                <td>
                    Titol
                </td>
                <td>
                    Imatge
                </td>
                <td>
                    Data Creació
                </td>
                <td>
                   Data Actualització
                </td>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
            
                <td>
                    {{ $category->title }}
                </td>
                <td>
                    <img src="/images/{{$category->image}}" width="150"/>
                </td>
                <td>
                    {{ $category->created_at->format('d-m-Y') }}
                </td>
                <td>
                    {{ $category->updated_at->format('d-m-Y') }}
                </td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>