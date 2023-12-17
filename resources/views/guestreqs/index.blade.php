@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Reservation Requests</h3>
                    </div>
                    <div class="card-body">
                        <table
                            class="table table-bordered table-striped {{ count($guestreqs) > 0 ? 'datatable' : '' }} dt-select">
                            <thead>
                                <tr>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($guestreqs) > 0)
                                    @foreach ($guestreqs as $guestreq)
                                        <tr data-entry-id="{{ $guestreq->id }}">
                                            <td>{{ $guestreq->guest->title }} {{ $guestreq->guest->name }} </td>
                                            <td>{{ $guestreq->guest->email }} </td>
                                            <td>
                                                @if ($guestreq->status != null)
                                                    <p class="badge badge-success badge-sm"> <i
                                                            class="mdi mdi-thumb-up-outline"></i> Confirmed </p>
                                                @else
                                                    <p class="badge badge-warning badge-sm"> <i class="mdi mdi-timer-sand">
                                                            Waiting</i>
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('guestreqs.show', [$guestreq->id]) }}"
                                                    class="badge badge-primary badge-sm"> View Details</a>
                                                @if ($guestreq->status == null)
                                                    <a href="{{ route('send-guest-req-email', [$guestreq->id]) }}"
                                                        class="badge badge-success badge-sm">Confirm Request</a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No Reservation Requests in Database</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                         <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $guestreqs->previousPageUrl() }}"
                                        tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item disabled"></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ $guestreqs->nextPageUrl() }}">Next</a>
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
