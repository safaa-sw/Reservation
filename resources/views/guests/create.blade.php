@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Guest</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('guests.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value=""
                                        autocomplete="name" autofocus>
                                    <label for="" id="nameError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value=""
                                        autocomplete="title" autofocus>
                                    <label for="" id="titleError" style="color: red; font-size:12px;"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value=""
                                        autocomplete="email">
                                    <label for="" id="emailError" style="color: red; font-size:12px;"></label>


                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submitbtn" value="Submit"> Save
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
            var letters = /^[A-Za-z ]+$/;

            //validation First name
            $("#nameError").hide();
            let nameError = true;
            $("#name").keyup(function() {
                validateName();
            });

            function validateName() {
                let nameValue = $("#name").val();
                if (nameValue.length == "") {
                    $("#nameError").show();
                    $("#nameError").html("*Name is Required");
                    nameError = false;
                    return false;
                } else if (!nameValue.match(letters)) {
                    $("#nameError").show();
                    $("#nameError").html("*please use English language");
                    nameError = false;
                    return false;

                }
                /*else if (nameValue.length < 3 || nameValue.length > 10) {
                                   $("#nameError").show();
                                   $("#nameError").html("**length of username must be between 3 and 10");
                                   nameError = false;
                                   return false;
                               } */
                else {
                    nameError = true;
                    $("#nameError").hide();
                }
            }


            //validation Title
            $("#titleError").hide();
            let titleError = true;
            $("#title").keyup(function() {
                validateTitle();
            });

            function validateTitle() {
                let titleValue = $("#title").val();
                if (titleValue.length == "") {
                    $("#titleError").show();
                    $("#titleError").html("*Title is Required");
                    titleError = false;
                    return false;
                } else if (!titleValue.match(letters)) {
                    $("#titleError").show();
                    $("#titleError").html("*please use English language");
                    titleError = false;
                    return false;

                }
                /*else if (titleValue.length < 3 || titleValue.length > 10) {
                                   $("#titleError").show();
                                   $("#titleError").html("**length of username must be between 3 and 10");
                                   titleError = false;
                                   return false;
                               } */
                else {
                    titleError = true;
                    $("#titleError").hide();
                }
            }

            // Validate Email
            $("#emailError").hide();
            let emailError = true;
            $("#email").keyup(function() {
                validateEmail();
            });

            function validateEmail() {
                let emailValue = $("#email").val();

                let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

                if (emailValue.length == "") {
                    $("#emailError").show();
                    $("#emailError").html("*Email is Required");
                    emailError = false;
                    return false;
                } else if (!emailValue.match(regex)) {
                    $("#emailError").show();
                    $("#emailError").html("*please Enter Valid email Address");
                    emailError = false;
                    return false;

                } else {
                    emailError = true;
                    $("#emailError").hide();
                }

            }


            // Submit button
            $("#submitbtn").click(function() {
                validateName();
                validateTitle();
                validateEmail();

                if (
                    nameError == true &&
                    titleError == true &&
                    emailError == true
                ) {
                    return true;
                } else {
                    return false;
                }
            });

        });
    </script>
@endsection
