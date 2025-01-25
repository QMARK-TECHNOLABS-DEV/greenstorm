<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <title>Greenstorm | Home</title>  --}}
{{-- <title>15th edition of the Greenstorm Global Photography Festival </title> --}}
@if(Request::segment(1) == 'about-greenstorm' || Request::segment(1) == 'about-g20')
<title>15 years of Greenstorm</title>
<meta name="title" content="Greenstorm Global Photography Festival: 15 Years of Photography, Nature, and Advocacy">
<meta name="description" content="Explore the Greenstorm Global Photography Festival and its 15-year journey celebrating photography, nature, and environmental advocacy. Join us in capturing the essence of our passion for a sustainable future.">
@elseif(Request::segment(1) == 'contests')
<title>Explore the World Through a Lens</title>
<meta name="title" content="Explore the World Through a Lens: Capturing Earth's Natural Wonders">
<meta name="description" content="Join a global movement dedicated to preserving our Earth's natural wonders through the power of imagery. Discover the beauty of our planet one click at a time with photographers who inspire change.">
@elseif(Request::segment(1) == 'festivals')
<title>A Visual odyssey </title>
<meta name="title" content="A Visual Odyssey: Greenstorm Global Photography Festival 15th Edition">
<meta name="description" content="Join us for an unforgettable celebration of our planet's beauty and challenges at the 15th edition of the Greenstorm Global Photography Festival. Explore awe-inspiring landscapes and intimate wildlife portraits as our photographers bring the wonders of nature to life.">
@elseif(Request::segment(1) == 'awards')
<title>Celebrating Excellence in Nature Photography</title>
<meta name="title" content="Celebrating Excellence in Nature Photography" >
<meta name="description" content="We celebrate excellence in various aspects of photography and environmental storytelling. Chosen by the festival's jury and  audience, this award recognizes the most popular nature photographs in the world.">
@elseif(Request::segment(1) == 'contact-us')
<title>Get in Touch with Greenstorm</title>
<meta name="title" content="Get in Touch with Greenstorm" >
<meta name="description" content="We'd love to hear from you! Whether you have questions, feedback, or inquiries, our team at Greenstorm is here to assist you.">
@else
<title>15th edition of the Greenstorm Global Photography Festival </title>
@endif

<link rel="preload" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" as="style">
<link rel="preload" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" as="style">

<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/animate.min.css') }}">
<link rel="icon" type="image/png" href="{{ asset('web/img/favicon.png') }} ">
<link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('web/css/custom/all.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('web/css/custom/line.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/custom/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('web/css/custom/bootstrap-datepicker.min.css') }}">
<link href="{{ asset('web/css/custom/select2.min.css') }}" rel="stylesheet" />
<link rel="preload" href="{{ asset('web/css/style.css') }}" as="script" />
<link rel="preload" href="{{ asset('web/css/meanmenu.css') }}" as="script" />
<link rel="preload" href="{{ asset('web/img/footer.jpg') }}" as="script" />
<link rel="stylesheet" href="{{ asset('web/css/meanmenu.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('web/css/new-style.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
@include('meta.google-tag')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
