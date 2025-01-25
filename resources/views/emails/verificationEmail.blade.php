<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <p>
        Please click the following link to verify your email address:
        <a href="{{ route('verification.verify', $token) }}">{{ route('verification.verify', $token) }}</a>
    </p>
</body>
</html>
