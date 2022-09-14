<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
</head>
<body>
    <p> Hi {{ $name }} Your details have been added successfully 
     With Kutayarisha
    </p>
     <p>
         <a href="{{ route('confirm', $email) }}" class="btn btn-primary">
         click here to confirm your email</a>
     </p>
</body>