@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Mobile Info</h3>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('guestreqs.mobileInfo', [$guest->id]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="countryCode" class="col-md-2 col-form-label text-md-left">Country Code</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="countryCode" id="countryCode"
                                        data-select-search="true">
                                        <option value="">Select a country code…</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->phonecode }} |
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="" id="countryCodeError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="mobile" class="col-md-2 col-form-label text-md-left">Mobile Number</label>
                                <div class="col-md-6">
                                    <input id="mobile" type="mobile" class="form-control" name="mobile" value=""
                                        autocomplete="mobile" autofocus>
                                    <label for="" id="mobileError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="otpCode" class="col-md-2 col-form-label text-md-left">OTP CODE</label>

                                <div class="col-md-6">
                                    <input id="otpCode" type="text" class="form-control" name="otpCode" value=""
                                        autocomplete="otpCode">
                                    <label for="" id="otpCodeError" style="color: red; font-size:12px;"></label>


                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> Save &
                                        Next
                                    </button>
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
            var letters = /^[0-9]+$/;

            //validation Mobile Number
            $("#mobileError").hide();
            let mobileError = true;
            $("#mobile").keyup(function() {
                validateMobile();
            });

            function validateMobile() {
                let mobileValue = $("#mobile").val();
                if (mobileValue.length == "") {
                    $("#mobileError").show();
                    $("#mobileError").html("*Mobile Number is Required");
                    mobileError = false;
                    return false;
                } else if (!mobileValue.match(letters)) {
                    $("#mobileError").show();
                    $("#mobileError").html("*please use numbers only");
                    mobileError = false;
                    return false;

                } else {
                    mobileError = true;
                    $("#mobileError").hide();
                }
            }


            //validation otpcode
            $("#otpCodeError").hide();
            let otpCodeError = true;
            $("#otpCode").keyup(function() {
                validateOtpCode();
            });

            function validateOtpCode() {
                var regex = /^[A-Za-z0-9]+$/;
                let otpCodeValue = $("#otpCode").val();
                if (otpCodeValue.length == "") {
                    $("#otpCodeError").show();
                    $("#otpCodeError").html("*otpCode is Required");
                    otpCodeError = false;
                    return false;
                } else if (!otpCodeValue.match(regex)) {
                    $("#otpCodeError").show();
                    $("#otpCodeError").html("*please use English language");
                    otpCodeError = false;
                    return false;
                } else if (otpCodeValue.length != 4) {
                    $("#otpCodeError").show();
                    $("#otpCodeError").html("**length of otpCode must be 4 character");
                    otpCodeError = false;
                    return false;
                } else {
                    otpCodeError = true;
                    $("#otpCodeError").hide();
                }
            }



            //validation Country Selection
            $("#countryCodeError").hide();
            let countryCodeError = true;
            $("#countryCode").change(function() {
                validateCountryCode();
            });

            function validateCountryCode() {
                let countryCodeValue = $("#countryCode").val();
                if (countryCodeValue.length == "") {
                    $("#countryCodeError").show();
                    $("#countryCodeError").html("*Country Code is Required");
                    countryCodeError = false;
                    return false;
                } else {
                    countryCodeError = true;
                    $("#countryCodeError").hide();
                }
            }



            // Submit button
            $("#submitbtn").click(function() {
                validateMobile();
                validateCountryCode();
                validateOtpCode();

                if (
                    mobileError == true &&
                    countryCodeError == true &&
                    otpCodeError == true
                ) {
                    return true;
                } else {
                    return false;
                }
            });

        });
    </script>
@endsection
