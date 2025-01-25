<x-app-layout>
    <section class="about-area pt-70  pb-70 pb_mbl_0 ">
       <div class="container">
          <div class="row align-items-center">

            {{-- <div class="col-md-12 pe-md-5 text-start wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                <h2 class="sec-ttl  mb-md-5 mb-3 text-green">Notifications </h2>
            </div> --}}
            <table class="table table-striped table-bordered">
                <thead class="bg-green text-white">
                  <tr>
                    <th scope="col" class="col-1">#</th>
                    <th scope="col" class="col-10 text-center">Notifications</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($notifications as $i => $notification)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <div><p>{{ $notification->data['message'] }}</p></div>
                                    <div class="d-flex justify-content-between">
                                        @if(isset($notification->data['url']))
                                        <div><a  class="fw-700 text-success link-hover-blue" href="{{ url($notification->data['url']) }}">View Details</a></div>
                                        @endif
                                        @if(isset($notification->data['certificate_url']))
                                        <div><a target="_blank" href="{{ url($notification->data['certificate_url']) }}" class="fw-700 link-hover-blue text-success">Download Participation Certificate <i class="fa fa-download"></i></a></div>
                                        @endif
                                    </div>
                                  </div>
                                <small class="text-right">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">
                            <div class="d-flex justify-content-center">
                                <div><i class="fa fa-exclamation-circle"></i> You don't have any notifications yet.</div>
                            </div>
                        </td>

                    </tr>
                    @endforelse

                </tbody>
              </table>
          </div>
       </div>
    </section>
</x-app-layout>
