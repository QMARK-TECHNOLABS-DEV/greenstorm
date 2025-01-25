<x-app-layout>
    <style>
    .category-badge{
        position: absolute;
        right: 0px;
        top: 0px;
        color: white;
        background: #36b348;
        padding: 10px;
    }
    .label__photo_id{
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        /* font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
        font-size: 20px;
        /* background-color: #000; */
        /* padding: 2px 5px; */
        border-radius: 2px;
        /* color: #fff; */
        font-weight: 900;
    }
    </style>
    <section>
        <div class="container">
            <div class="mt-5 alert" style="background-color: #ffd9d9" role="alert">
                <h3 class="alert-heading">Competition Expired!</h3>
                <p>We apologize, but the photo competition has expired.</p>
                <hr style="border: 1px solid #a3a3a3;">
                <p class="mb-0">If you would like to view your uploads, please <a href="{{route('list.uploaded.photographs')}}">click here</a>.</p>
                <br>
                <p class="mb-0"> <a href="{{ route('contest.voting') }}" class="btn btn-success text-white">VOTE NOW</a></p>
            </div>
        </div>
    </section>
    <style>
        .image_uploaded_card { background-color: #EFF3FA;}

        .image_uploaded_card   .photo_card_img img { max-height: 400px;}

        .image_uploaded_card .photo_card_content { padding: 30px; }
        .image_uploaded_card  .photo_card_content .datat_list  { padding-left: 0px;}
        .image_uploaded_card  .photo_card_content .datat_list li {font-size: 16px;  color: #000; list-style: none;
        line-height: 30px; }
        .image_uploaded_card  .photo_card_content p { font-size: 16px; color: #000; }

        @media (max-width: 991px) {
            .image_uploaded_card {padding: 20px;}
            .image_uploaded_card .photo_card_content { padding: 0px; }
        }
    </style>
</x-app-layout>
