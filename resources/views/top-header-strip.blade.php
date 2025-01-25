{{-- <style>
    .top-header {
        background-color: #fff !important;
    }

    .btn_top_head {
        background-color: #fff;
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 10px;
    }

    .top-header p {
        line-height: 35px;
        top: 0px;
        font-size: 16px;
    }
</style>


<div class="top-header" >
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-7 col-sm-8 col-lg-5 ms-auto text-center news_col d-flex-align-items-center">


            </div>
            <div class="col-5 col-sm-4  col-lg-4 text-end translate_col ">
                <div id="google_translate_element"></div>
            </div>
        </div>
    </div>
</div> --}}


<style>
    .top-header {
       background-color: #e0e0e0 !important;
    }
    .top-header p span { display: inline-block !important;}
    .btn_top_head {
        background-color: #fff;
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 10px;display: inline-block;
    }

    .top-header p {
        line-height: 35px;
        top: 0px;
        line-height: 20px;
        font-size: 16px;
    }
    @media (max-width: 1500px){
        .btn_top_head {  display: inline-block;line-height: 13px;}
        .top-header p { line-height: 26px; font-size: 13px;}
    }

    @media (max-width: 767px){
        .top-header p span.mb_hide { display: none !important;}
        .top-header p {
            line-height: 17px;
            top: 0px;
            font-size: 11px;
        }

        .btn_top_head {

            padding: 6px;
            font-size: 12px;
            border-radius: 10px;
        }
    }
</style>

<div class="top-header " >
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-7 col-sm-8 col-lg-7 col-xl-7  text-center news_col d-flex-align-items-center">
                <p class="d-none">
                    <span class="number-fontfamily">
                    <a class="text-white" href="">   Cast Your Votes Now!
                        <span class="inline-block mb_hide">
                         Elevate Your Favorite Photographs to the Top &nbsp; </span>

                        </a>
                    <a class="btn_top_head" href="{{ route('contest.voting') }}">
                        Vote Now </a>
                    </span>
                </p>
            </div>
            <div class="col-5 col-sm-4  col-lg-5 col-xl-5 text-end translate_col ">
                <div id="google_translate_element"></div>
            </div>
        </div>
    </div>
</div>
