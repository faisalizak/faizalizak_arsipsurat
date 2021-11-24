@extends('layouts.app')

@section('content')
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p10">
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

                <div class="row m-t-2">
                    <div class="col-lg-12">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title" style="background-image:asset('images/bg-title-01.jpg')">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <center>
                                    <h3> DETAIL ARSIP SURAT</h3>
                                </center>
                            </div>
                            @foreach($query as $p)
                            <div class="col-lg-12">
                                <table class="m-l-20 m-t-20 m-b-20 ">
                                    <tr>
                                        <td width="141" height="21">Nomor Surat</td>
                                        <td width="4">: </td>
                                        <td width="274">&nbsp;{{$p->arsip_nomor}}</td>
                                    </tr>
                                    <tr>
                                        <td width="141" height="21">Kategori</td>
                                        <td width="4">: </td>
                                        <td width="274">&nbsp;{{$p->arsip_kategori}}</td>
                                    </tr>
                                    <tr>
                                        <td width="141" height="21">Judul</td>
                                        <td width="4">: </td>
                                        <td width="274">&nbsp;{{$p->arsip_judul}}</td>
                                    </tr>
                                    <tr>
                                        <td width="141" height="21">Waktu Unggah</td>
                                        <td width="4">: </td>
                                        <td width="500">&nbsp; Tanggal&nbsp;:&nbsp;{{ \Carbon\Carbon::parse($p->arsip_waktu)->isoFormat('DD MMMM Y')}} &nbsp; Jam&nbsp;:&nbsp;{{ \Carbon\Carbon::parse($p->arsip_waktu)->format('H:i')}} WIB</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row m-l-20">
                                <a href="{{url('/')}}" class=" ml-2 btn btn-sm btn-danger" data-toggle="tooltip" title="Kembali">
                                    <i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                                <a href="{{asset('file_surat/'.$p->arsip_file)}}" download class=" ml-2 btn btn-sm btn-warning" data-toggle="tooltip" title="Unduh">
                                    <i class="fas fa-download" aria-hidden="true"></i>Unduh</a>
                                <button class=" ml-2 btn btn-sm btn-info" id="btn_edit" name="btn_edit" data-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit" aria-hidden="true"></i> Edit/Ganti File</button>
                            </div>
                            <div id="editarsip" class="col-lg-12 m-t-15">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Surat</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{route('editarsip')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$p->arsip_id}}">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file" class=" form-control-label">File Surat (PDF)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file" accept=".pdf" name="file" class="form-control-file">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
                                        <button type="reset" id="btnbatal" class="btn btn-danger btn-sm">
                                            <i class="fa fa-remove"></i> Batal
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <iframe class="m-t-20 m-b-20" src="{{asset('file_surat/'.$p->arsip_file)}}" width="100%" height="600"></iframe>
                            @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $('#editarsip').hide();
    $(document).on('click', '#btn_edit', function(e) {
        $('#editarsip').show();
        $('#btn_edit').hide();
    });
    $(document).on('click', '#btnbatal', function(e) {
        $('#editarsip').hide();
        $('#btn_edit').show();
    });
</script>
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