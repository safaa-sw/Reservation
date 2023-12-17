@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Accommodation Info</h3>
                    </div>


                    <div class="card-body">
                        <h5>Please choose your accommodation preference as you are eligible for (5-night)</h5><br>
                        <form method="POST" action="{{ route('guestreqs.accommodationInfo', [$guestReqId]) }}">
                            @csrf
                            <h5 style="color:grey">Eligible Night</h5><br>

                            <div class="form-group row">
                                <label for="checkin" class="col-md-2 col-form-label text-md-left">Check in Date</label>
                                <div class="col-md-6">
                                    <input id="checkin" type="date" class="form-control" name="checkin" value=""
                                        autocomplete="checkin" autofocus>
                                    <label for="" id="checkinError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkout" class="col-md-2 col-form-label text-md-left">Check out Date</label>
                                <div class="col-md-6">
                                    <input id="checkout" type="date" class="form-control" name="checkout" value=""
                                        autocomplete="checkout" autofocus>
                                    <label for="" id="checkoutError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" id="diffError" style="color: red; font-size:12px;"></label>
                            </div>


                            <div class="form-group row">
                                <label for="roomtype" class="col-md-2 col-form-label text-md-left">Room Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="roomtype" id="roomtype" data-select-search="true"
                                        required>
                                        <option value="">Select a Room Type</option>
                                        <option value="0">King bed</option>
                                        <option value="1">Twin bed</option>
                                    </select>
                                    <label for="" id="roomtypeError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>

                            <input type="checkbox" name="extraNight" id="extraNight" value="" />
                            <label for="extraNight">Extra Night</label><br><br>

                            <div id="extraNightDiv">
                                <div class="form-group row">
                                    <label for="checkinExtra" class="col-md-2 col-form-label text-md-left">Check in
                                        Date</label>
                                    <div class="col-md-6">
                                        <input id="checkinExtra" type="date" class="form-control" name="checkinExtra"
                                            value="" autocomplete="checkinExtra" autofocus>
                                        <label for="" id="checkinExtraError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="checkoutExtra" class="col-md-2 col-form-label text-md-left">Check out
                                        Date</label>
                                    <div class="col-md-6">
                                        <input id="checkoutExtra" type="date" class="form-control" name="checkoutExtra"
                                            value="" autocomplete="checkoutExtra" autofocus>
                                        <label for="" id="checkoutExtraError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="roomtypeExtra" class="col-md-2 col-form-label text-md-left">Room
                                        Type</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="roomtypeExtra" id="roomtypeExtra"
                                            data-select-search="true">
                                            <option value="">Select a Room Type</option>
                                            <option value="0">King bed</option>
                                            <option value="1">Twin bed</option>
                                        </select>
                                        <label for="" id="roomtypeExtraError"
                                            style="color: red; font-size:12px;"></label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> Save & Next
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
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            $("#extraNightDiv").hide();
            $("#extraNight").change(function() {
                $("#extraNightDiv").show();
            });
            /**********************************************************************/

            //validation checkin date
            $("#checkinError").hide();
            let checkinError = true;
            $("#checkin").change(function() {
                validateCheckIn();
            });

            function validateCheckIn() {
                let checkinValue = $("#checkin").val();
                if (checkinValue.length == "") {
                    $("#checkinError").show();
                    $("#checkinError").html("*Check in date is Required");
                    checkinError = false;
                    return false;
                } else if (checkinValue < today) {
                    $("#checkinError").show();
                    $("#checkinError").html("*please select date in future");
                    checkinError = false;
                    return false;
                } else {
                    checkinError = true;
                    $("#checkinError").hide();
                }
            }
            /********************************************************************************/

            //validation checkout date
            $("#checkoutError").hide();
            let checkoutError = true;
            $("#checkout").change(function() {
                validateCheckOut();
            });

            function validateCheckOut() {
                let checkoutValue = $("#checkout").val();
                if (checkoutValue.length == "") {
                    $("#checkoutError").show();
                    $("#checkoutError").html("*Check out date is Required");
                    checkoutError = false;
                    return false;
                } else if (checkoutValue < today) {
                    $("#checkoutError").show();
                    $("#checkoutError").html("*please select date in future");
                    checkoutError = false;
                    return false;
                } else {
                    checkoutError = true;
                    $("#checkoutError").hide();
                }
            }
            /*******************************************************************************/

            //validate difference between dates
            $("#diffError").hide();
            let diffError = true;

            function validateDifference() {
                let checkoutValue = $("#checkout").val();
                let checkinValue = $("#checkin").val();
                if ((checkinValue.length != "") && (checkoutValue.length != "")) {
                    var diff = Math.floor((Date.parse(checkoutValue) - Date.parse(checkinValue)) / 86400000);
                    if (diff > 5) {
                        $("#diffError").show();
                        $("#diffError").html("*difference between checkin and check out must not be more than 5");
                        diffError = false;
                        return false;

                    } else {
                        diffError = true;
                        $("#diffError").hide();
                    }

                }

            }
            /*********************************************************************************/

            //validation checkin Extra date
            $("#checkinExtraError").hide();
            let checkinExtraError = true;
            $("#checkinExtra").change(function() {
                validateCheckInExtra();
            });

            function validateCheckInExtra() {
                let checkinExtraValue = $("#checkinExtra").val();
                if (checkinExtraValue.length == "") {
                    $("#checkinExtraError").show();
                    $("#checkinExtraError").html("*Check in date is Required");
                    checkinExtraError = false;
                    return false;
                } else if (checkinExtraValue < today) {
                    $("#checkinExtraError").show();
                    $("#checkinExtraError").html("*please select date in future");
                    checkinExtraError = false;
                    return false;
                } else {
                    checkinExtraError = true;
                    $("#checkinExtraError").hide();
                }
            }
            /********************************************************************************/

            //validation checkout Extra date
            $("#checkoutExtraError").hide();
            let checkoutExtraError = true;
            $("#checkoutExtra").change(function() {
                validateCheckOutExtra();
            });

            function validateCheckOutExtra() {
                let checkoutExtraValue = $("#checkoutExtra").val();
                if (checkoutExtraValue.length == "") {
                    $("#checkoutExtraError").show();
                    $("#checkoutExtraError").html("*Check out date is Required");
                    checkoutExtraError = false;
                    return false;
                } else if (checkoutExtraValue < today) {
                    $("#checkoutExtraError").show();
                    $("#checkoutExtraError").html("*please select date in future");
                    checkoutExtraError = false;
                    return false;
                } else {
                    checkoutExtraError = true;
                    $("#checkoutExtraError").hide();
                }
            }
            /*******************************************************************************/

            //validation Room Type Extra
            $("#roomtypeExtraError").hide();
            let roomtypeExtraError = true;
            $("#roomtypeExtra").change(function() {
                validateRoomtypeExtra();
            });

            function validateRoomtypeExtra() {
                let roomtypeExtraValue = $("#roomtypeExtra").val();
                if (roomtypeExtraValue.length == "") {
                    $("#roomtypeExtraError").show();
                    $("#roomtypeExtraError").html("*Room Type Extra is Required");
                    roomtypeExtraError = false;
                    return false;
                } else {
                    roomtypeExtraError = true;
                    $("#roomtypeExtraError").hide();
                }
            }

            /*********************************************************************************/


            // Submit button
            $("#submitbtn").click(function() {
                validateCheckIn();
                validateCheckOut();
                validateDifference();
                let checkError = true;
                if ($('#extraNight').prop('checked') == true) {
                    validateCheckInExtra();
                    validateCheckOutExtra();
                    validateRoomtypeExtra();
                    if (
                        checkinExtraError == true &&
                        checkoutExtraError == true &&
                        roomtypeExtraError == true
                    ) {
                        checkError = true;
                    } else {
                        checkError = false;
                    }
                }

                if (
                    checkinError == true &&
                    checkoutError == true &&
                    diffError == true &&
                    checkError == true

                ) {
                    return true;
                } else {
                    return false;
                }
            });


        });
    </script>
@endsection
