@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"></div>


                <div class="panel-body">

                    <h5>Well Done</h5><br>
                    <h5>Your information has been submitted successfully</h5><br>
                    <h5>You will receive in coming day invitation email with instructions from RS4IT to book your flight.</h5><br>
                    <h5>See you soon</h5><br>
                    
                    <a href="{{route('visaRes')}}" class="btn btn-default">Finish</a>
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
