@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Guests</h3>
                </div>
                <div class="card-body">
                    <table
                    class="table table-bordered table-striped {{ count($guests) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($guests) > 0)
                            @foreach ($guests as $guest)
                                <tr data-entry-id="{{ $guest->id }}">
                                   
                                    <td>{{ $guest->name}} </td>
                                    <td>{{ $guest->title }}</td>
                                    <td>{{ $guest->email }}</td>
                                    <td>
                                        <a href="{{ route('guests.show',[$guest->id]) }}" class="badge badge-info badge-sm">
                                            <i class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('guests.edit',[$guest->id]) }}" class="badge badge-primary badge-sm">
                                            <i class="mdi mdi-pencil-box-outline"></i></a>
                                        <a href="{{ route('send-guest-email',[$guest->id]) }}" class="badge badge-success badge-sm">
                                            <i class="mdi mdi-email"></i></a>
                                       
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No Guests in Database</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                    <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $guests->previousPageUrl() }}"
                                        tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item disabled"></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $guests->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Start -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
