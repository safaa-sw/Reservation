<!-- plugins:js -->
<script src="{{ asset('templateA/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('templateA/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('templateA/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('templateA/vendors/progressbar.js/progressbar.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('templateA/js/off-canvas.js') }}"></script>
<script src="{{ asset('templateA/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('templateA/js/template.js') }}"></script>
<script src="{{ asset('templateA/js/settings.js') }}"></script>
<script src="{{ asset('templateA/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('templateA/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('templateA/js/dashboard.js') }}"></script>
<script src="{{ asset('templateA/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

@yield('javascript')
