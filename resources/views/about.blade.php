@extends('layouts.app')

@section('content')
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3 style="font-size: 20px; font-family: arial;" id="jam"></h3>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    @include('sweetalert::alert')
    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">ABOUT</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-18 m-t-20">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user"></i>
                            <strong class="card-title pl-2">Profile</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block" src="{{asset('images/icon/faizal.jpg')}}" width="120" height="120" alt="Card image cap">
                                <p class="text-sm-center">Aplikasi Ini Dibuat Oleh :</p>
                                <h4 class="text-sm-center mt-2 mb-1">MUHAMMAD FAIZAL IZAK</h4>
                                <h5 class="text-sm-center">(1931713050)</h5>
                                <div class="location text-sm-center">
                                    <i class="fa fa-calendar"></i> 23 November 2021</div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="#">
                                    <i class="fa fa-facebook pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest pr-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript">
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = '<i class="fas fa-clock"></i> ' + h + ':' + m + ':' + s + ' WIB';

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
</script>
@endsection