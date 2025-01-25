<x-app-layout>

    <style>

        /* Enable box-sizing */


/* Reset button */
button.like_btn {
  position: relative;
  cursor: pointer;
  border: none;
  background: none;
  padding: 0;
  outline: none;
}

.button.like_btn {
  z-index: 1;
  margin: 0.5em;
  color: #aab2bd;
  font-size: 1rem;
  padding: 0.2em 0.6em;
  min-width: 2.4em;
  min-height: 2.4em;
  border-radius: 0.2em;
  background: #f2f3f5;
  box-shadow: 0 2px 0 rgba(0, 0, 0, 0.1);
  outline: none;
  transition: background 0.2s;
  /* Loader */
  /* Animation */
  /* Buttons colors variants */
}
.button.like_btn i {
  transition: 0.2s;
}
.button.like_btn:hover, .button.like_btn:focus {
  color: #8d98a7;
}
.button.like_btn:hover:active i, .button.like_btn:focus:active i {
  transform: scale(0.8);
}
.button.rounded.like_btn {
  border-radius: 2em;
}
.button.is-loading {
  pointer-events: none;
  position: relative;
  color: transparent !important;
}
.button.is-loading:after {
  z-index: 1;
  content: "";
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  height: 1em;
  width: 1em;
  margin-left: -0.5em;
  margin-top: -0.5em;
  -webkit-animation: loader-animation 600ms infinite linear;
          animation: loader-animation 600ms infinite linear;
  font-size: inherit;
  color: #aab2bd !important;
  border: 0.2em solid;
  border-radius: 0.7em;
  border-right-color: transparent;
  border-top-color: transparent;
}
@-webkit-keyframes loader-animation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes loader-animation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.button.is-active {
  z-index: 2;
  color: white;
  background: #0076ff;
  -webkit-animation: 0.8s;
          animation: 0.8s;
}
.button.is-active:before, .button.is-active:after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -2px;
  margin-top: -2px;
  width: 6px;
  height: 6px;
  border-radius: 100%;
  transform: scale(0);
  color: #aab2bd;
  border: 1px solid transparent;
  box-shadow: -0.8em 0 0 -2px, 0.8em 0 0 -2px, 0 -0.8em 0 -2px, 0 0.8em 0 -2px, -0.6em -0.6em 0 -2px, -0.6em 0.6em 0 -2px, 0.6em -0.6em 0 -2px, 0.6em 0.6em 0 -2px;
}
.button.is-active:before {
  -webkit-animation: effect-01-animation 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
          animation: effect-01-animation 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.button.is-active:after {
  -webkit-animation: effect-02-animation 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
          animation: effect-02-animation 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
@-webkit-keyframes effect-01-animation {
  from {
    transform: rotate(-15deg) scale(0);
  }
  40% {
    opacity: 1;
  }
  to {
    transform: rotate(-30deg) scale(2.5);
    opacity: 0;
  }
}
@keyframes effect-01-animation {
  from {
    transform: rotate(-15deg) scale(0);
  }
  40% {
    opacity: 1;
  }
  to {
    transform: rotate(-30deg) scale(2.5);
    opacity: 0;
  }
}
@-webkit-keyframes effect-02-animation {
  from {
    transform: rotate(10deg) scale(0);
  }
  40% {
    opacity: 1;
  }
  to {
    transform: rotate(30deg) scale(2);
    opacity: 0;
  }
}
@keyframes effect-02-animation {
  from {
    transform: rotate(10deg) scale(0);
  }
  40% {
    opacity: 1;
  }
  to {
    transform: rotate(30deg) scale(2);
    opacity: 0;
  }
}
.button.thumb:before, .button.thumb:after {
  color: #3b5998;
}
.button.thumb.is-active {
  background: #3b5998;
}
.button.thumb.is-active:focus {
    color:#fff;
 }
 @keyframes shake {
    10%, 90% {
        transform: translate3d(-1px, 0, 0);
    }

    20%, 80% {
        transform: translate3d(2px, 0, 0);
    }

    30%, 50%, 70% {
        transform: translate3d(-4px, 0, 0);
    }

    40%, 60% {
        transform: translate3d(4px, 0, 0);
    }
}
.shake {
    animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
}
    </style>
    <div class="modal fade" id="imagePopUpModal" aria-hidden="true" aria-labelledby="imagePopUpModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg myModal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body p-relative content">

                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

 {{-- @if (!Auth::check()) --}}
  <!-- Modal -->
  <div class="modal fade" id="loginModal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title text-center">Login</h5>
        </div> 
        <div class="modal-body py-3 px-4"> 
            <div class="error-message"></div>
            <form id="login-form" class="login-form" method="POST">
                @if(session('email_verified'))
                    <div class="alert alert-success">
                        Your email has been verified successfully!
                    </div>
                @endif
                @csrf
                <div class="form-group pb-2">
                    <label for="username">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
                <div class="text-end">
                    <button type="submit" id="login-text" class="btn btn-primary text-white mt-2">Login</button>
                </div>
                <div class="justify-content-md-center text-start text-lg-center d-flex mt-2 mt-md-4">
                    <span class="text-dark text-grey fw-600"> Don't have an account? <a class="text-dark text-green" href="{{ route('signup') }}">Sign Up</a></span>
                </div>
                <div class="text-center">
                    Or
                </div>
                <div>
                    
                    <ul class="login-social text-center ">
                        <li>
                            <a href="{{ route('login.google') }}?category={{ request('category') }}" target="_blank">
                                <img height="25px" src="{{ asset('web/img/google.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login.facebook') }}?category={{ request('category') }}" target="_blank">
                                <img height="25px" src="{{ asset('web/img/facebook.svg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div> 
            </form> 
        </div>
        <div>
            <div class="alert  alert-dismissible fade show text-danger" style="font-size: 13px;font-weight: 600;background: #e9e9e9;text-align: center;border-radius:0px;"role="alert">
                Please be aware that your device's or app's privacy settings, or your location, might prevent social sign-in for voting. If this occurs, please log in or register using your email address instead. 
            </div>
        </div>
      </div>
    </div>
  </div>
{{-- @endif --}}
<style>
    .votography-desc p{
        font-size: 16px;
        line-height: 1.5;
    }
    /*.first-paragraph::first-letter{
        margin-left:50px !important;
    }*/
    .header-desc h2, .header-desc h5, .header-desc h4,.header-desc h6{
        color:#fff !important;
    }
</style>
<style>
.read-more-content{
	display: none;
	padding-top: 15px;
}
</style>
<style>
    .vote-page-header {padding: 96px 0px !important; position:relative;}
      .vote-page-header:after{content:''; position:absolute;
      left:0px;top:0px; width:100%;height:100%;background:#00000017;}
.vote-page-header .page-header-border {
    width: 65%;
    margin: 20px auto; z-index:0;
    display: block;
    border-bottom: 1px solid #45A735;
}

.vote-page-header .header-desc{position:relative; z-index:1; }

    .vote-page-header    h4 { line-height: 31px !important;margin-top:15px;}


</style>
    <section class="page-header vote-page-header text-white py-3  bg-light-one" style="background-image: url('{{ asset('web/img/voting-sub-banner.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-8 mx-auto text-center header-desc py-4">
                    <!--<h2 class="mb-0  text-center sec-ttl-2 ">#Votography</h2>-->
                    <h2 class="mb-0  text-center sec-ttl-2 ">Finalists</h2>
                    <span class="page-header-border "> </span>
                    <h4 class="text-center m-0 fs-4 lh-lg pb-0">
                        <!--From Vistas to Victors: <br>   Cast Your Vote for the Ultimate Landscape Today!-->
                        15th Greenstorm Global Photography Festival
                        </h4>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-60 pb-40">
        <div class="votography-desc text-center py-3">


              <div class="container" >
            <div class="row">
                <div class="col-lg-10 mx-auto ">
            <p class="first-paragraph text-start">Welcome to the 15th Greenstorm Global Photography Festival, where beautiful landscapes from around the world take center stage! We have received
            <b class="number-fontfamily">17,716</b> entries from talented photographers across <b class="number-fontfamily">153</b> countries, each narrating a unique story of the world's wonders. We have two categories: Camera and Mobile Phones.</p>
            <!--<div class="read-more-content">-->
            <!--    <p class="text-start">As we unveil the finalists in each category, we invite you to be part of the celebration by casting your vote for your favorite photograph. Now, it's your opportunity to play a crucial role in determining the winners of the competition. The winners will emerge from the combined scores given by our esteemed jury and the votes received from the public during this exhibition.</p>-->
            <!--    <p>-->
            <!--        <b>Follow these instructions to cast your vote:</b>-->
            <!--        {{-- <ul class="text-start">-->
            <!--            <li>Click "Sign in" to access the voting platform.</li>-->
            <!--            <li>Scroll through the exhibited photographs and click to enjoy the enlarged image and the story.</li>-->
            <!--            <li>Vote (Like) for your favorite photograph. Voting rights are limited to only one entry for each category.</li>-->
            <!--            <li>Share your favorite with your friends on social media handles and let nature's beauty inspire them too.</li>-->
            <!--        </ul> --}}-->
            <!--        <ul class="text-start">-->
            <!--            <li>Scroll through the exhibited photographs, click to enjoy the enlarged image and read the accompanying stories.</li>-->
            <!--            <li>Choose your favourite photograph and click on the like button.</li>-->
            <!--            <li>Sign up with your email address, Google or Facebook.</li>-->
            <!--            <li>Vote (Like) for your favourite photograph. Please note that voting rights are limited to only one entry for each category.</li>-->
            <!--            <li>Share your favorite with your friends on social media handles and let nature's beauty inspire them too.</li>-->
            <!--        </ul>-->
            <!--    </p>-->
            <!--</div>-->
            <!--<p class="read-more-btn text-green text-start fw-700 m-0 p-0 up cursor-pointer" onclick="toggleReadMore()" role="button"> Read More <i class="fas fa-angle-down"></i></p>-->
        </div>
        </div> </div>
    </section>
    <section class="tab-area festival-area  pt-40 pb-60 pb_mbl_0">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-block my-5">
                        <ul class="nav nav-pills nav-fill">
                            {{-- <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Much longer nav link</a>
                            </li> --}}
                            @foreach ($photo_categories as $category)
                                @php
                                    $isActive = request('category') && request('category') == $category->id;
                                @endphp
                                <a class="rounded-0 border border-green fw-600 nav-link {{$isActive ? 'active bg-green text-white' : 'text-green'}}" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() . '?category=' . $category->id }}" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="d-flex justify-content-end py-2 pb-4">
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm btn-rounded dropdown-toggle" type="button" id="categoryFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-filter"></i>
                                @if(request('category'))
                                    {!! $photo_categories->where('id', request('category'))->first()->title ?? 'All Entries' !!}
                                @else
                                    All Entries
                                @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="categoryFilterDropdown">
                                <!-- All Entries - Default Selected -->
                                <a class="dropdown-item category-item {{ !request('category') ? 'active' : '' }}" href="{{ Request::url() }}">All Entries</a>
                                <!-- Category Items -->
                                @foreach ($photo_categories as $category)
                                    @php
                                        $isActive = request('category') && request('category') == $category->id;
                                    @endphp
                                    <a class="dropdown-item {{$isActive ? 'active' : ''}}" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() . '?category=' . $category->id }}" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                    <style>

                    .corner-badge {
                      position: absolute;
                      top: 0;
                      right: 0;
                      background: #4d4da1;
                      padding: 5px; /* Adjust the padding as needed */
                      text-align: center;
                    }

                    .corner-badge span {
                      color: #fff; /* Set the text color */
                      font-size: 18px; /* Adjust the font size as needed */
                    }

                    /* Optional: Add styles to center the thumbs-up icon */
                    .corner-badge .fa-thumbs-up {
                      display: block;
                      margin: auto;
                    }

                    </style>
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12 text-end  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                            <ul class="votes_gallery_list row mb-0 p-0  gy-4" id="voting-container">
                                @include('voting-photos-loop',[ 'votingPhotos' => $votingPhotos ])
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                        <button class="btn btn-primary text-white" id="load-more-btn">Load More</button>
                    </div> --}}
                    <!-- end tab-content -->
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
    // Swal.fire({
    //     title: 'Thank You!',
    //     html: '<p>Thank you for your invaluable support and participation in the voting phase. Stay tuned for the Award Ceremony on <b>22 April 2024, World Earth Day.</b></p><p>Together, let\'s continue to make a positive impact for our planet.</p>',
    //     customClass: {
    //         popup: 'custom-swal-width'
    //     },
    //     showCancelButton: false,
    //     confirmButtonText: "Close"
    // });    
     $(document).on('click', '.btn-next', function(e) {
        let photoID = $(this).data('photo-id');
        let nextPhotoID = $('.votingListingImgSection_' + photoID).next().data('photo-id');
        if(nextPhotoID != undefined){
            $('a[data-photo-id="' + nextPhotoID + '"]').trigger('click');
        }else{
            $('#imagePopUpModal .modal-dialog').addClass('shake');
            setTimeout(function() {
                $('#imagePopUpModal .modal-dialog').removeClass('shake');
            }, 800);
        }
    });
    $(document).on('click', '.btn-prev', function(e) {
        let photoID = $(this).data('photo-id');
        let prevPhotoID = $('.votingListingImgSection_' + photoID).prev().data('photo-id');
        if(prevPhotoID !== undefined){
            $('a[data-photo-id="' + prevPhotoID + '"]').trigger('click');
        }else{
            $('#imagePopUpModal .modal-dialog').addClass('shake');
            setTimeout(function() {
                $('#imagePopUpModal .modal-dialog').removeClass('shake');
            }, 800);
        }
    });
    $(document).on('click', '.likeButtonAction',function(e) {
        e.preventDefault();
        let __this = $(this);
        let photo_id = __this.data('photo-id');
        let photo_category = __this.data('photo-category');
        @if (Auth::check())
            $.post("{{ route('voting.like.image') }}", {
                        _token: "{{ csrf_token() }}",
                        photo_id: photo_id,
                    }, function (data) {
                        if(data.likeStatus == "like"){
                            __this.addClass('is-active');
                        }else if(data.likeStatus == "dislike"){
                            __this.removeClass('is-active');
                        }else{
                            Swal.fire({
                                title: 'Sorry',
                                text: data.message,
                                icon: 'warning',
                                showCancelButton: false,
                            });
                        }
                        __this.next('p').text('Votes - ' + (data.voteCount ?? 0));
                        $('.votingListing__' +photo_id).html('<i class="fa-regular fa-thumbs-up" ></i>  Votes - <span> ' + data.voteCount + '</span>');
            }).fail(function (xhr, status, error) {
                            Swal.fire({
                                title: 'Thank You!',
                                html: xhr.responseJSON.message,
                                // icon: 'warning',
                                customClass: {
                                    popup: 'custom-swal-width'
                                },
                                showCancelButton: false,
                                confirmButtonText: "Close",
                            });
                });
        @else

            localStorage.setItem('photo_id', photo_id);
            localStorage.setItem('photo_category', photo_category);
            $('#loginModal').modal('show');
        @endif
    })


    $(document).on('click', '.imagePopupTriggerButton',function(e) {
        e.preventDefault();
        let photo_id = $(this).data('photo-id');
        $.post("{{ route('voting.popup.image') }}", {
                    _token: "{{ csrf_token() }}",
                    photo_id: photo_id,
                }, function (data) {
            $('#imagePopUpModal .content').html(data.html);
            $('#imagePopUpModal').modal('show');
        });
    });
</script>
<script>
    $(document).on('submit', '#login-form', function(event) {
    // $('#login-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        // Get form data
        $('.error-response').remove();
        var formData = $(this).serialize();
        $('#login-text').html('Processing...');
        // Send AJAX request to Laravel backend
        $.ajax({
            //url: siteURL+'/process-login', // Update with the correct URL for your login route
            url: "{{ route('user.process_login') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#login-text').html('Login');
                // window.location.href = siteURL+'/profile'; // Update with the correct URL for your profile page
                // if(response.role == 'photographer') {
                //     window.location.href = "{{ route('profile.photograph.upload') }}";
                // }else{
                let photoCategory = "{{ request()->input('category') ?? 1 }}";
                if(photoCategory) {
                    window.location.href = "{{ route('contest.voting') }}?category="+photoCategory;
                }
                // }

            },
            error: function(xhr) {

                $('#login-text').html('Login');
                $('.error-message').show();
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        // var errorHtml = '<div class="text-danger text-start">' + messages[0] + '</div>';
                        $('#' + field).attr('style','border:1px solid red')
                    });
                    $('.error-message').html('<div class="text-danger text-center">Invalid Credentials!</div>')
                    setTimeout(() => {
                       $('.error-message').hide(200).html('');
                    }, 1500);
                } else {
                    alert('An error occurred during registration.');
                }
            }
        });
    });
    @if(request()->has('ggpfImageId'))
        $('#imagePopUpModal').on('hidden.bs.modal', function (e) {
            window.location.href = "{{ route('contest.voting') }}";
        });
    @endif

    $(document).on('click','#copyButton', function() {
       let photoID =  $(this).data('photo-id');
       let photoCategoryID =  $(this).data('photo-category');
       let __this = $(this);
       let CopyURL = "{{ route('contest.voting') }}"+'?category=' +photoCategoryID+ '&ggpfImageId='+photoID;
        navigator.clipboard.writeText(CopyURL)
            .then(() => {
                __this.html(`<i class="fa-solid fa-clipboard"></i>  Link Copied`);
                setTimeout(() => {
                    __this.html(`<i class="fa-regular fa-clipboard"></i>
            Grab Link`);
                }, 3000);
            })
            .catch(err => {
                console.error('Error in copying text: ', err);
            });
    });

</script>

<script>
    $('.read-more-btn').click(function() {
        $(this).prev().slideToggle();
        if ($(this).hasClass('up')) {
            $(this).removeClass('up').html('Read More <i class="fas fa-angle-up"></i>');
        } else {
            $(this).addClass('up').html('Read Less <i class="fas fa-angle-down"></i>');
        }
    });
</script>

 <script>
     $(document).on('click','#shareButton',function() {
        let photoID =  $(this).data('photo-id');
        let photoCategoryID =  $(this).data('photo-category');
        let __this = $(this);
        let shareURL = "{{ route('contest.voting') }}"+'?category=' +photoCategoryID+ '&ggpfImageId='+photoID;
        handleShareButtonClick(shareURL);
     });

     function handleShareButtonClick(shareURL) {

      if (navigator.share) {
        navigator.share({
          title: '15th edition of the Greenstorm Global Photography Festival',
        //   text: shareURL,
          url: shareURL
        })
        .then(() => console.log('Successfully shared'))
        .catch(error => console.error('Error sharing:', error));
      } else {
        // Fallback for browsers that don't support the Web Share API
        alert('Web Share API is not supported in this browser. Please use the native sharing options on your device.');
      }
    }
 </script>
<script>
      var page = 2; // Initial page value, as the first page is already loaded
    var category = '{{ request("category") }}'; // Get the current category from the URL

    $(document).ready(function () {
    //     $('#load-more-btn').on('click', function () {
    //         fetch_data(page, category);
    //         page++;
    //     });

    //     function fetch_data(page, category) {
    //         $.ajax({
    //             url: '{{ route("contest.voting") }}?page=' + page + '&category=' + category,
    //             method: 'GET',
    //             success: function (data) {
    //                 if (data.votingPhotos.data.length > 0) {
    //                     // Append new photos to the existing ones
    //                     $('#voting-container').append(data.votingPhotos);
    //                 } else {
    //                     // If no more photos, hide the "Load More" button
    //                     $('#load-more-btn').hide();
    //                 }
    //             },
    //         });
    //     }
    // });
</script>
