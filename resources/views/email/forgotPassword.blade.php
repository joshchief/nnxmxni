<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>

    <h2>Click on the link below to reset password:</h2>
    <p><a href="{{ route('reset.password.get', $token) }}">Reset Password</a></p>
</body>
</html>