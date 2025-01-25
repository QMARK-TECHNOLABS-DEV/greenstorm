

@if(isset($completedStageCreation) && $completedStageCreation ==true)
<div class="text-danger p-4 text-center" role="alert">
    <h4 class="alert-heading "><i class="fas fa-times-circle"></i>
    Apologies, unable to create a new stage.</h4>
    <p class="badge badge-danger tx-white tx-18"> <b>{{ $message }}</b></p>
    <p class="mb-0">Please notify the reviewers who are currently in the active stage to take action.</p>
</div>
@else
<div class="text-danger p-4 text-center" role="alert">
    <h4 class="alert-heading"><i class="fas fa-times-circle"></i>
        Apologies, unable to create a new stage.</h4>

    <p class="badge badge-danger tx-white tx-18"> <b>{{ $message }}</b></p>
    <p class="mb-0">Please notify the reviewers who are currently in the active stage to take action.</p>

    @foreach ($pendingActionCount as $key => $category)
    <h6 class="tx-dark text-left">{!!$key!!}</h6>
      <table class="table table-bordered" style="border:1px solid #cccc">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Reviewer</th>
            <th scope="col">Pending Count</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($category as $reviewer_email => $pending_count)
            <tr>
                <th scope="row">{{ $i }}</th>
                <th scope="row">{{ $reviewer_email }}</th>
                <th scope="row">{{ $pending_count }}</th>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach

        </tbody>
      </table>
      <br>
    @endforeach
</div>
@endif
