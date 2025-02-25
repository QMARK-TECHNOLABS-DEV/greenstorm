<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PJ5MXFB3');</script>
<!-- End Google Tag Manager -->


        <script>
document.getElementById('register-form').addEventListener('submit', function() {
    fbq('track', 'SignUp');
});
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
</head>
<body>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ5MXFB3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <x-app-layout>
        @push('head')
        @endpush

        <div class="container my-5 py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="">
                        <h3 class="card-header">{{ __('One last step..') }}</h3>
                        <hr>
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                    {{ __('Please also check your spam folder for any emails.') }}
                                </div>
                            @endif

                            {!! __('Thank you for registering with us! We have sent you an email to: <b>'.Auth::user()->email.'</b> for the verification. Occasionally, our emails may end up in your <b>spam or junk</b> folder. Be sure to check there as well.') !!} 
                            <br><br>
                            {{ __(' If you haven\'t received the email, please be patient. Sometimes, email delivery can take a few minutes. In case you receive multiple emails, always use the verification link from the most recent one.') }} 
                            <br><br>
                            {{ __('If you haven\'t received the email within 5 minutes, you can request a resend of the verification email by clicking on the "Resend Verification Email" button.') }} 
                            <br><br>

                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button id="resendButton" type="submit" class="btn btn-success bg-green" style="display:none;">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </form>

                            <div class="countdown fw-600"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        var serverTimestamp = "{{ $verification->created_at }}";

        function updateCountdown() {
            var currentTime = moment();
            var serverTime = moment.utc(serverTimestamp);
            var remainingTime = 5 * 60 - currentTime.diff(serverTime, 'seconds');

            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                document.getElementById('resendButton').style.display = 'block';
                document.querySelector('.countdown').style.display = 'none';
            } else {
                var minutes = Math.floor(remainingTime / 60);
                var seconds = remainingTime % 60;
                var displayTime = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
                document.querySelector('.countdown').innerHTML = 'Resend available in ' + displayTime + ' minutes';
            }
        }

        updateCountdown();
        var countdownInterval = setInterval(updateCountdown, 1000);
    </script>
</body>
</html>
