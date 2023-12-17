@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Show Guest</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $guest->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $guest->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $guest->email }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <p>&nbsp;</p>

                        <a href="{{ route('guests.index') }}" class="btn btn-default">Back to List</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
