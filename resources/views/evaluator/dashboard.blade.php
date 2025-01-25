<x-evaluator-app-layout>
    <x-slot name="breadcrumps">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('evaluator.dashboard') }}">evaluator</a>
                <span class="breadcrumb-item active">Dashboard</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title">
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-book-outline"></i>
            <div>
                <h4>Dashboard </h4>
                <p class="mg-b-0">Introducing  evaluator template, the most handsome evaluator template of all time.</p>
            </div>
        </div>
    </x-slot>
    {{-- {{ __("You're logged in!") }} --}}
    @if(session('success'))
        <div class="alert alert-success alert-bordered" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             {!! session('success') !!}.
        </div>
    @endif
</x-evaluator-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
@if(session('success'))
{{-- <script>
   Swal.fire({
    title: 'Congratulations!',
    text: "You have successfully logged in and gained access to the platform.",
    icon: 'success',
    showCancelButton: false,
    confirmButtonText: '<i class="fas fa-sign-in-alt"></i> Continue'
    }).then((result) => {

    });
</script> --}}
@endif
