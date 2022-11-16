<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        div {
            position: fixed;
            bottom: 50%;
            right: 30%;
            left: 43%;

        }
    </style>
</head>

<body>
    @section('content')
        <div>
            <h1>Name : {{ $student->name }}</h1>
            <h1>Email : {{ $student->email }}</h1>
            <h1>Mobile : {{ $student->mobile }}</h1>
        </div>
    </body>

    </html>
