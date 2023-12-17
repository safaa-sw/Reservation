@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $guest->title }} {{ $guest->name }}:</h3></div>


                <div class="panel-body">
                    <br>
                    <h5>Welcome to RS4IT, Thank you for accepting our invitation</h5><br>
                    <h5>Please click on link below for reservation</h5><br>
                    
                    <a href="{{ route('guestreqs.mobileInfo',[$guest->id]) }}" class="btn btn-default">Start Reservation</a>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
