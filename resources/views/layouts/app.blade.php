<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    {{-- Style --}}
    @include('includes.style')



</head>

<body id="page-top">

     <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- Sidebar --}}
        @include('includes.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- Navbar --}}
                @include('includes.navbar')

                @yield('content')

            </div>
            <!-- End of Main Content -->

            {{-- Footer --}}
            @include('includes.footer')

        </div>
        <!-- End of Content Wrapper --> 

    </div>
    <!-- End of Page Wrapper -->

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>