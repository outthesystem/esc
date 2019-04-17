<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Escuela School Management System - Laravel | Installation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Creativeitem" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">
    @include('backend.layout.styles')
</head>

<body>

<!-- Begin page -->
<div class="wrapper">
    <!-- Start Page Content here -->
    <div class="content-page" style="margin-left: 0px;">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Escuela School Management System -Laravel Version</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                    @yield('content')
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div>
            <!-- container -->
        </div>
        <!-- content -->
        @include('backend.layout.footer')

    </div>
    <!-- End Page content -->
</div>
<!-- END wrapper -->
@include('backend.layout.scripts')
@yield('scripts')
</body>
</html>
