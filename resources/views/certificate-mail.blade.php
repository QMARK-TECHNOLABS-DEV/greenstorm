<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html{
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        body {
            background-image: url("{{asset('web/img/certificate/certificate-participation.jpg') }}");
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            font-family: 'Montessaret', sans-serif;
        }

        .content {
            /* Style your content here */
            padding: 20px;

            color: rgb(21, 5, 5);
            text-align: center;
        }
        .content  p{
            position: absolute;
            bottom: 280px;
            color: rgb(17, 17, 41);

            left: 0px;
            right: 0px;
        }
        .content  h1{
            position: absolute;
            bottom: 300px;
            color:#154875;
            margin: auto;
            left: 0px;
            right: 0px;
            text-transform: uppercase;
            font-size: 40px !important;
            /* font-weight: 900; */
            font-family: 'Montessaret', sans-serif;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>{{ $user->name }}</h1>
    </div>
</body>
</html>
