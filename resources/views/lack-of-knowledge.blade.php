

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-2">
           @includeIf('common.side-nav')
        </div>
        <div class="col-md-9 mb-2">
            <h2>Lack of Laravel & PHP </h2>
            <p></p>


            <h4> Task 1 Design </h4>
            <div class="list-group mb-3">
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Mobile View ( SP )
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Tablet
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Laptop
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Pc
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Bulb Animation
                </label>
            </div>

            <h4 class="my-2"> Task 2 System</h4>
            <div class="list-group">
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Map View
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  DateRange Search
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" checked>
                  Admin Control User Shop List
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" >
                  Tag System ( For me , with node js [eg. mongodb is really easy] but for sql and laravel eloquent not enough time)
                </label>
                <label class="list-group-item">
                  <input class="form-check-input me-1" readonly type="checkbox" >
                  Responsive Map (Most of time, i'm struggling with laravel code that long time I can't manage PHP)
                </label>
            </div>
        </div>
    </div>
</div>
@endsection
