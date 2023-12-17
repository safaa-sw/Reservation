@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Guest Rerservation Request</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Mobile No</th>
                                        <td>{{ $guestReqData['mobile'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $guestReqData['firstname'] }} {{ $guestReqData['lastname'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td>{{ $guestReqData['birthdate'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td>{{ $guestReqData['gender'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Place Of Birth</th>
                                        <td>{{ $guestReqData['birth_place'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country of Residency</th>
                                        <td>{{ $guestReqData['residency_country'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Passport No</th>
                                        <td>{{ $guestReqData['passport_no'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Issue Date</th>
                                        <td>{{ $guestReqData['issue_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Expiry Date</th>
                                        <td>{{ $guestReqData['expiry_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Issue Place</th>
                                        <td>{{ $guestReqData['issue_place'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Arrival Date</th>
                                        <td>{{ $guestReqData['arrival_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profession</th>
                                        <td>{{ $guestReqData['profession'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Organization</th>
                                        <td>{{ $guestReqData['organization'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Visa Duration</th>
                                        <td>{{ $guestReqData['visa_duration'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Visa Status</th>
                                        <td>{{ $guestReqData['visa_status'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Passport Picture</th>
                                        <td><img src="{{ asset($guestReqData['passport-picture']) }}"
                                                style="height: 100px; width:100px"></td>
                                    </tr>
                                    <tr>
                                        <th>Personal Picture</th>
                                        <td><img src="{{ asset($guestReqData['personal-picture']) }}"
                                                style="height: 100px; width:100px"></td>
                                    </tr>
                                    <tr>
                                        <th>Eligible Night</th>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Check In ->></th>
                                                    <td>{{ $guestReqData['eligible-checkin'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Check Out ->></th>
                                                    <td>{{ $guestReqData['eligible-checkout'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Room type ->></th>
                                                    <td> {{ $guestReqData['eligible-roomtype'] }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @if (array_key_exists('extra-checkin', $guestReqData))
                                        <tr>
                                            <th>Extra Night</th>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Check In ->></th>
                                                        <td>{{ $guestReqData['extra-checkin'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Check Out ->></th>
                                                        <td>{{ $guestReqData['extra-checkout'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Room type ->></th>
                                                        <td>{{ $guestReqData['extra-roomtype'] }}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endif

                                </table>
                            </div>
                        </div>

                        <p>&nbsp;</p>
                        
                        @if ($guestReqData['status'] == null)
                        <a href="{{ route('send-guest-req-email', [$guestReqId]) }}" class="badge badge-success badge-sm">Confirm
                            Request</a>
                            @endif
                        @if ($guestReqData['companion'] == 1)
                            <a href="{{ route('guestreqs.companionShow', [$guestReqId]) }}" class="badge badge-primary badge-sm">View
                                Companion Info</a>
                        @endif
                        <a href="{{ route('guestreqs.index') }}" class="btn btn-default">Back to List</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
