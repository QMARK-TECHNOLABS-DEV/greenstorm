 <x-app-layout>
    <style>
        .link {
            color: #0e8fce !important;
        }

        .card {
            border: none !important;
            position: relative;
            height: 100%;
        }

        .card-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s;

        }
        .card:hover .card-button {
            opacity: 1;
            color: white;
        }
        .card:hover img{
            opacity: 0.5;
        }
    </style>
    <section class="pt-70 pb-70 pb_mbl_0 mb-5">
        <div class="container">
            <h2 class="sec-ttl mb-3 text-green ">Press Release </h2>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('web/pdf/press-release/thumbnail/SPA.jpg') }}" class="img-fluid" height="500px"/>
                            <a href="{{ asset('web/pdf/press-release/SPA.pdf') }}" class="btn btn-primary card-button" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('web/pdf/press-release/thumbnail/AR.jpg') }}" class="img-fluid" height="500px"/>
                            <a href="{{ asset('web/pdf/press-release/AR.pdf') }}" class="btn btn-primary card-button" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('web/pdf/press-release/thumbnail/EN.jpg') }}" class="img-fluid" height="500px"/>
                            <a href="{{ asset('web/pdf/press-release/EN.pdf') }}" class="btn btn-primary card-button" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('web/pdf/press-release/thumbnail/FR.jpg') }}" class="img-fluid" height="500px"/>
                            <a href="{{ asset('web/pdf/press-release/FR.pdf') }}" class="btn btn-primary card-button" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('web/pdf/press-release/thumbnail/CH.jpg') }}" class="img-fluid" height="500px"/>
                            <a href="{{ asset('web/pdf/press-release/CH.pdf') }}" class="btn btn-primary card-button" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('web/pdf/press-release/thumbnail/HINDI.jpg') }}" class="img-fluid" height="500px"/>
                            <a href="{{ asset('web/pdf/press-release/HINDI.pdf') }}" class="btn btn-primary card-button" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Add more cards with similar structure for other PDFs -->

            </div>
        </div>
    </section>
</x-app-layout>

