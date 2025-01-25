<!-- resources/views/emails/password-reset.blade.php -->
<!DOCTYPE html>
<html>
<head></head>
<body>
    <h1>Custom Password Reset Email</h1>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>Click the button below to reset your password:</p>
    <a href="{{ $actionUrl }}">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
</body>
</html>
