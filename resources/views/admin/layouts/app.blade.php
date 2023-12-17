<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">


<head>
    @include('admin.layouts.head')
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        @include('admin.layouts.navbar')
        
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.settings')

            

            @include('admin.layouts.sidebar')

            
            <div class="main-panel">

                @yield('content')


                @include('admin.layouts.footer')

                
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.layouts.javascripts')
    
</body>

</html>
