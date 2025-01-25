<style>
    .category-selection-area .card-title{
        text-transform: uppercase !important;
    }
    .selected-card {
            background-color: #343a40 !important;
            color: white !important;
        }
    .selected-card .card-title {
        color: white !important;
    }
</style>
<div class="container p-3">
    <form action="" id="continueWithCategoryForm" class="mb-0">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-6 m-0">
                    <div class="card h-100" onclick="selectCard('category_{{$category->id}}', this)">
                        <div class="card-body bg-light">
                            <h6 class="card-title">
                                <input type="radio" name="category" id="category_{{$category->id}}" value="{{$category->id}}"> {!! $category->title !!}
                            </h6>
                            <p class="card-text">{!! $category->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 d-flex justify-content-end mt-2">
                <button class="btn btn-primary btn-sm " type="submit">CONTINUE <i class="fa fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</div>
