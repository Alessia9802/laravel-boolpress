<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Contact email</title>
</head>
<body>
    <h1>Hai un nuovo contatto</h1>

    <dl>
        <dd>Name:{{$data['name']}}</dd>
        <dd>Lastname:{{$data['lastname']}}</dd>
        <dd>Email:{{$data['Email']}}</dd>
        <div class="content">
            <p>
                <dd>Message:{{$data['message']}}</dd>
            </p>
        </div>
    </dl>
</body>
</html>
