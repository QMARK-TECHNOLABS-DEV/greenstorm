<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            color: #333;
        }
        a{
            color: #333;
        }
        .btn-green {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello {{ $user->name }},</h2>
        <p>{{ $user->email }}</p>
        <p>Thank you for registering as a {{ $user->role }}.</p>
        <p>Please use the following link to set your password:</p>
        <p><a class="btn btn-green" href="{{ route('admin.reset.password', ['token' => $token]) }}">Set Password</a></p>
        <p>Alternatively, you can copy and paste the following URL into your browser:</p>
        <p>{{ route('admin.reset.password', ['token' => $token]) }}</p>
        <p>If you did not request this token, please ignore this email.</p>
        <p>Thank you,</p>
        <p>Greenstorm Admin Team</p>
    </div>
</body>
</html>

