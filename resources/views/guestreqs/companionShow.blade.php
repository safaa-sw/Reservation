@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Show Companion Information</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $companionData['firstname'] }} {{ $companionData['lastname'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td>{{ $companionData['birthdate'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td>{{ $companionData['gender'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Place Of Birth</th>
                                        <td>{{ $companionData['birth_place'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country of Residency</th>
                                        <td>{{ $companionData['residency_country'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Passport No</th>
                                        <td>{{ $companionData['passport_no'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Issue Date</th>
                                        <td>{{ $companionData['issue_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Expiry Date</th>
                                        <td>{{ $companionData['expiry_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Issue Place</th>
                                        <td>{{ $companionData['issue_place'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Arrival Date</th>
                                        <td>{{ $companionData['arrival_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profession</th>
                                        <td>{{ $companionData['profession'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Organization</th>
                                        <td>{{ $companionData['organization'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Visa Duration</th>
                                        <td>{{ $companionData['visa_duration'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Visa Status</th>
                                        <td>{{ $companionData['visa_status'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Passport Picture</th>
                                        <td><img src="{{ asset($companionData['passport-picture']) }}"
                                                style="height: 100px; width:100px"></td>
                                    </tr>
                                    <tr>
                                        <th>Personal Picture</th>
                                        <td><img src="{{ asset($companionData['personal-picture']) }}"
                                                style="height: 100px; width:100px"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <p>&nbsp;</p>
                        <a href="{{ route('guestreqs.show', [$guestReqId]) }}" class="btn btn-default">Back to Request</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
