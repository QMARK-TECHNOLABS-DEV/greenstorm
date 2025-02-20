<x-app-layout>
             @push('head')

       <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '928734065914549');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=928734065914549&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '928734065914549');
fbq('track', 'PageView');
fbq('track', 'SignUp');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=928734065914549&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
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
                        {{-- <h4>{{ __('One last step..') }}</h4> --}}
                        {!! __('Thank you for registering with us! We have sent you an email to: <b>'.Auth::user()->email.'</b>  for the verification. Occasionally, our emails may end up in your <b>spam or junk</b> folder. Be sure to check there as well.') !!} <br><br>
                        {{ __(' If you haven\'t received the email, please be patient. Sometimes, email delivery can take a few minutes. In case you receive multiple emails, always use the verification link from the most recent one.') }} <br><br>
                        {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
                        {{ __('If you haven\'t received the email within 5 minutes, you can request a resend of the verification email by clicking on the "Resend Verification Email" button.') }} <br><br>
                        {{-- {{ __('If you did not receive the email') }}, --}}
                        {{-- <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form> --}}

                        {{-- {{$verification}} --}}
                        {{-- @if ($verification && now()->diffInMinutes($verification->created_at) >= 5)
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        @endif --}}

                        {{-- @if ($verification && now()->diffInMinutes($verification->created_at->setTimezone('UTC')) >= 5) --}}

                            {{-- <div id="timer">
                              <strong > Resend available in <span id="minutes">0</span> minutes and <span id="seconds">0</span> seconds</strong>
                            </div> --}}
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button id="resendButton" type="submit" class="btn btn-success bg-green" style="display:none;">{{ __('Resend Verification Email') }}</button>
                            </form>
                        {{-- @endif --}}
                        <div class="countdown fw-600"></div>
                        {{-- <div>{{now()->diffInMinutes($verification->created_at->setTimezone('UTC'))}}</div> --}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
 <!-- Blade template (Laravel view) -->
<script>
     // Timestamp from Laravel
     var serverTimestamp = "{{ $verification->created_at }}";

    function updateCountdown() {
        var currentTime = moment();
        var serverTime = moment.utc(serverTimestamp);
        var remainingTime = 5 * 60 - currentTime.diff(serverTime, 'seconds');

        if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            // location.reload();
            $('#resendButton').show();
            $('.countdown').hide();
        } else {
            var minutes = Math.floor(remainingTime / 60);
            var seconds = remainingTime % 60;
            var displayTime = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
            $('.countdown').html('Resend available in '+displayTime+' minutes');
        }
    }

    // Initial update
    updateCountdown();

    // Update the countdown every second
    var countdownInterval = setInterval(updateCountdown, 1000);
</script>
