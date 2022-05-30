@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-2">
           @includeIf('common.side-nav')
        </div>
        <div class="col-md-9 mb-2">
            @includeIf('common.messages')
            @includeIf('common.shop-edit-form')

            <div class="bg-white p-4 rounded-4 mb-3">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <input autocomplete="off" placeholder="Search By Name" type="text" class="form-control" id="nameInput" name="shop_name" value="{{ $queryName ?? '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="form-group">
                                <input autocomplete="off" placeholder="Search By Address" type="text" class="form-control" id="emailInput" name="shop_address" value="{{ $queryAddress ?? '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <input class="form-control datetimepicker-input d-inline-block mr-2" type="text" name="search_date" placeholder="Date" aria-label="Date" data-toggle="datetimepicker" data-target="#datePicker" id="datePicker">
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary btn-block"> <i class="fa fa-search"></i> Search </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-white p-4 rounded-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Shop Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $shop)
                            <tr>
                                <th scope="row">{{$shop->id}}</th>
                                <td>{{$shop->shop_name}}</td>
                                <td>{{$shop->shop_address ?? '-'}}</td>
                                <td>
                                    <button
                                     type="button"
                                     class="btn btn-outline-{{ $user->id === $shop->user_id  ? 'success' : 'primary'}} shop-edited-wrapper"
                                     data-value="{{json_encode($shop)}}"
                                    >
                                      {{ $user->id === $shop->user_id  ? 'Edit' : 'View'}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex p-2 justify-content-end">
                    {!! $shops->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('body-scripts')
    <script>
       (function(){
            setTimeout(function () {
                var datePicker = $('#datePicker');
                $(datePicker).daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });
                $(datePicker).on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
                });

                var isAlreadyDate = '{{$searchDate}}';
                if (isAlreadyDate) {
                    $(datePicker).val(isAlreadyDate);
                }
            }, 500);
       })();
    </script>
@endpush
