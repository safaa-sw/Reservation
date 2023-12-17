@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Companion Info</h3>
                    </div>


                    <div class="card-body">
                        <h5>Please fill below information for Companion per to passport</h5><br>

                            <form method="POST" action="{{ route('guestreqs.companionInfo', [$guestReqId]) }}"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row">
                                    <label for="firstname" class="col-md-2 col-form-label text-md-left">First Name</label>
                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control" name="firstname"
                                            value="" autocomplete="firstname" autofocus>
                                        <label for="" id="firstnameError"
                                            style="color: red; font-size:12px"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-md-2 col-form-label text-md-left">Last Name</label>
                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname"
                                            value="" autocomplete="lastname" autofocus>
                                        <label for="" id="lastnameError" style="color: red; font-size:12px"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birthdate" class="col-md-2 col-form-label text-md-left">Date of
                                        Birth</label>
                                    <div class="col-md-6">
                                        <input id="birthdate" type="date" class="form-control" name="birthdate"
                                            value="" autocomplete="birthdate" autofocus>
                                        <label for="" id="birthdateError"
                                            style="color: red; font-size:12px"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-2 col-form-label text-md-left">Gender</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender" id="gender" data-select-search="true"
                                            required>
                                            <option value="">Select a gender</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                        <label for="" id="genderError" style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birth_place" class="col-md-2 col-form-label text-md-left">Place of
                                        Birth</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="birth_place" id="birth_place"
                                            data-select-search="true" required>
                                            <option value="">Select a country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="" id="birth_placeError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="residency_country" class="col-md-2 col-form-label text-md-left">Country of
                                        Residency</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="residency_country" id="residency_country"
                                            data-select-search="true" required>
                                            <option value="">Select a country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="" id="residency_countryError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="passport_no" class="col-md-2 col-form-label text-md-left">Passport
                                        No</label>
                                    <div class="col-md-6">
                                        <input id="passport_no" type="text" class="form-control" name="passport_no"
                                            value="" autocomplete="passport_no" autofocus>
                                        <label for="" id="passport_noError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="issue_date" class="col-md-2 col-form-label text-md-left">Issue
                                        Date</label>
                                    <div class="col-md-6">
                                        <input id="issue_date" type="date" class="form-control" name="issue_date"
                                            value="" autocomplete="issue_date" autofocus>
                                        <label for="" id="issue_dateError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expiry_date" class="col-md-2 col-form-label text-md-left">Expiry
                                        Date</label>
                                    <div class="col-md-6">
                                        <input id="expiry_date" type="date" class="form-control" name="expiry_date"
                                            value="" autocomplete="expiry_date" autofocus>
                                        <label for="" id="expiry_dateError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="issue_place" class="col-md-2 col-form-label text-md-left">Place of
                                        Issue</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="issue_place" id="issue_place"
                                            data-select-search="true" required>
                                            <option value="">Select a country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="" id="issue_placeError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="arrival_date" class="col-md-2 col-form-label text-md-left">Arrival
                                        Date</label>
                                    <div class="col-md-6">
                                        <input id="arrival_date" type="date" class="form-control" name="arrival_date"
                                            value="" autocomplete="arrival_date" autofocus>
                                        <label for="" id="arrival_dateError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="profession"
                                        class="col-md-2 col-form-label text-md-left">Profession</label>
                                    <div class="col-md-6">
                                        <input id="profession" type="text" class="form-control" name="profession"
                                            value="" autocomplete="profession" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="organization"
                                        class="col-md-2 col-form-label text-md-left">Organization</label>
                                    <div class="col-md-6">
                                        <input id="organization" type="text" class="form-control" name="organization"
                                            value="" autocomplete="organization" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="visa_duration" class="col-md-2 col-form-label text-md-left">Visa
                                        Duration</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="visa_duration" id="visa_duration"
                                            data-select-search="true" required>
                                            <option value="">Select visa duration</option>
                                            @for ($i = 1; $i <= 90; $i++)
                                                <option value="{{ $i }}">{{ $i }} day</option>
                                            @endfor
                                        </select>
                                        <label for="" id="visa_durationError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="visa_status" class="col-md-2 col-form-label text-md-left">Visa
                                        Status</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="visa_status" id="visa_status"
                                            data-select-search="true" required>
                                            <option value="">Select visa status</option>
                                            <option value="0">Multiple</option>
                                            <option value="1">Single</option>
                                        </select>
                                        <label for="" id="visa_statusError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="passportPic" class="col-md-2 col-form-label text-md-left">Passport
                                        Picture</label>
                                    <div class="col-md-6">
                                        <input id="passportPic" type="file" class="form-control" name="passportPic"
                                            required>
                                        <label for="" id="passportPicError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="personalPic" class="col-md-2 col-form-label text-md-left">Personal
                                        Picture</label>
                                    <div class="col-md-6">
                                        <input id="personalPic" type="file" class="form-control" name="personalPic"
                                            required>
                                        <label for="" id="personalPicError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> Save &
                                            Next </button>
                                    </div>
                                </div>


                                
                            </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var letters = /^[A-Za-z]+$/;
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            //validation First name
            $("#firstnameError").hide();
            let firstnameError = true;
            $("#firstname").keyup(function() {
                validateFirstName();
            });

            function validateFirstName() {
                let fnameValue = $("#firstname").val();
                if (fnameValue.length == "") {
                    $("#firstnameError").show();
                    $("#firstnameError").html("*First Name is Required");
                    firstnameError = false;
                    return false;
                } else if (!fnameValue.match(letters)) {
                    $("#firstnameError").show();
                    $("#firstnameError").html("*please use English language");
                    firstnameError = false;
                    return false;

                }
                /*else if (fnameValue.length < 3 || fnameValue.length > 10) {
                                   $("#firstnameError").show();
                                   $("#firstnameError").html("**length of username must be between 3 and 10");
                                   firstnameError = false;
                                   return false;
                               } */
                else {
                    firstnameError = true;
                    $("#firstnameError").hide();
                }
            }
            /********************************************************************************/

            //validation Last name
            $("#lastnameError").hide();
            let lastnameError = true;
            $("#lastname").keyup(function() {
                validateLastName();
            });

            function validateLastName() {
                let lnameValue = $("#lastname").val();
                if (lnameValue.length == "") {
                    $("#lastnameError").show();
                    $("#lastnameError").html("*Last Name is Required");
                    lastnameError = false;
                    return false;
                } else if (!lnameValue.match(letters)) {
                    $("#lastnameError").show();
                    $("#lastnameError").html("*please use English language");
                    lastnameError = false;
                    return false;

                }
                /*else if (lnameValue.length < 3 || lnameValue.length > 10) {
                                   $("#lastnameError").show();
                                   $("#lastnameError").html("**length of username must be between 3 and 10");
                                   lastnameError = false;
                                   return false;
                               } */
                else {
                    lastnameError = true;
                    $("#lastnameError").hide();
                }
            }
            /**********************************************************************************/

            //validation Birthdate
            $("#birthdateError").hide();
            let birthdateError = true;
            $("#birthdate").change(function() {
                validateBirthDate();
            });

            function validateBirthDate() {
                let birthdateValue = $("#birthdate").val();
                if (birthdateValue.length == "") {
                    $("#birthdateError").show();
                    $("#birthdateError").html("*Birth date is Required");
                    birthdateError = false;
                    return false;
                } else if (birthdateValue > today) {
                    $("#birthdateError").show();
                    $("#birthdateError").html("*please select date in past");
                    birthdateError = false;
                    return false;
                } else {
                    birthdateError = true;
                    $("#birthdateError").hide();
                }
            }
            /********************************************************************************/

            //validation Passport No
            $("#passport_noError").hide();
            let passport_noError = true;
            $("#passport_no").keyup(function() {
                validatePassportNo();
            });

            function validatePassportNo() {
                var regex = /^[A-Za-z0-9]+$/;
                let passport_noValue = $("#passport_no").val();
                if (passport_noValue.length == "") {
                    $("#passport_noError").show();
                    $("#passport_noError").html("*passport no is Required");
                    passport_noError = false;
                    return false;
                } else if (!passport_noValue.match(regex)) {
                    $("#passport_noError").show();
                    $("#passport_noError").html("*please use English language");
                    passport_noError = false;
                    return false;
                } else if (passport_noValue.length < 6) {
                    $("#passport_noError").show();
                    $("#passport_noError").html("**length of passport No must be at least 6 character");
                    passport_noError = false;
                    return false;
                } else {
                    passport_noError = true;
                    $("#passport_noError").hide();
                }
            }
            /********************************************************************************/

            //validation isuue date
            $("#issue_dateError").hide();
            let issue_dateError = true;
            $("#issue_date").change(function() {
                validateIssueDate();
            });

            function validateIssueDate() {
                let issue_dateValue = $("#issue_date").val();
                if (issue_dateValue.length == "") {
                    $("#issue_dateError").show();
                    $("#issue_dateError").html("*issue date is Required");
                    issue_dateError = false;
                    return false;
                } else if (issue_dateValue > today) {
                    $("#issue_dateError").show();
                    $("#issue_dateError").html("*please select date in past");
                    issue_dateError = false;
                    return false;
                } else {
                    issue_dateError = true;
                    $("#issue_dateError").hide();
                }
            }
            /*******************************************************************************************/

            //validation expiry date
            $("#expiry_dateError").hide();
            let expiry_dateError = true;
            $("#expiry_date").change(function() {
                validateExpiryDate();
            });

            function validateExpiryDate() {
                let expiry_dateValue = $("#expiry_date").val();
                if (expiry_dateValue.length == "") {
                    $("#expiry_dateError").show();
                    $("#expiry_dateError").html("*expiry date is Required");
                    expiry_dateError = false;
                    return false;
                } else if (expiry_dateValue < today) {
                    $("#expiry_dateError").show();
                    $("#expiry_dateError").html("*please select date in future");
                    expiry_dateError = false;
                    return false;
                } else {
                    expiry_dateError = true;
                    $("#expiry_dateError").hide();
                }
            }
            /*******************************************************************************************/

            //validation arrival date
            $("#arrival_dateError").hide();
            let arrival_dateError = true;
            $("#arrival_date").change(function() {
                validateArrivalDate();
            });

            function validateArrivalDate() {
                let arrival_dateValue = $("#arrival_date").val();
                if (arrival_dateValue.length == "") {
                    $("#arrival_dateError").show();
                    $("#arrival_dateError").html("*arrival date is Required");
                    arrival_dateError = false;
                    return false;
                } else if (arrival_dateValue < today) {
                    $("#arrival_dateError").show();
                    $("#arrival_dateError").html("*please select date in future");
                    arrival_dateError = false;
                    return false;
                } else {
                    arrival_dateError = true;
                    $("#arrival_dateError").hide();
                }
            }
            /*******************************************************************************************/





            // Submit button
            $("#submitbtn").click(function() {
                validateFirstName();
                validateLastName();
                validateBirthDate();
                validatePassportNo();
                validateIssueDate();
                validateExpiryDate();
                validateArrivalDate();


                if (
                    firstnameError == true &&
                    lastnameError == true &&
                    birthdateError == true &&
                    passport_noError == true &&
                    issue_dateError == true &&
                    expiry_dateError == true &&
                    arrival_dateError == true

                ) {
                    return true;
                } else {
                    return false;
                }
            });

        });
    </script>
@endsection
