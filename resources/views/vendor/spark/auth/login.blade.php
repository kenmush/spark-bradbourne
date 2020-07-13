@extends('spark::layouts.app')
@push('links')
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
@endpush

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8"> -->
        @include('spark::shared.errors')
            <hello csrf="{{ csrf_token() }}"></hello>    
        <!-- </div>
    </div>
</div> -->
@endsection
