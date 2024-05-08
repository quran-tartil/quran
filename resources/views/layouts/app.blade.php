<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- TODO : Install par npm -->
    <!-- Include CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


    @vite('resources/sass/app.scss')
    @stack('third_party_stylesheets')
    @stack('page_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/man.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->prenom . ' ' . Auth::user()->nom }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('images/man.png') }}" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                {{ Auth::user()->nom . ' ' . Auth::user()->prenom }}
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
        </footer>
    </div>


    
</body>

@vite('resources/js/app.js')
@stack('third_party_scripts')
@stack('page_scripts')

<!-- 

    Ce script est utiliser pour la recherche dans la page index
 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function fetchData(page, searchValue) {

            url_path = window.location.href;
           
    
            url_path += "/?page="
            // alert(url_path);
            $.ajax({

                url: url_path + page + '&searchValue=' + searchValue,
                success: function(data) {
                    var newData = $(data);

                    $('tbody').html(newData.find('tbody').html());
                    $('#card-footer').html(newData.find('#card-footer').html());
                    var paginationHtml = newData.find('.pagination').html();
                    if (paginationHtml) {
                        $('.pagination').html(paginationHtml);
                    } else {
                        $('.pagination').html('');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                    
                }
            });
            console.log(searchValue);
        }

        $('body').on('click', '.pagination a', function(param) {

            param.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            console.log(page);
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);

        });

        $('body').on('keyup', '#table_search', function() {
            var page = $('#page').val();
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);
        });

    });

    function submitForm() {
        document.getElementById("importForm").submit();
    }
</script>


</html>