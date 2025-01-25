<x-app-layout>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <h3 class="card-header text-green">{{ __('Sorry! Email verification link expired') }}</h3>
                    <hr>
                    <div class="card-body">
                        <p>The link you have clicked is expired. Please request a new verification link by clicking on the "Resend Verification Email" link on the Sign up/login page.</p>
                        <a href="{{ route('login') }}" class="btn btn-success bg-green tx-bolder">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
