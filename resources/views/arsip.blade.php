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
                            <h2 class="title-1">ARSIP SURAT</h2>
                            <button type="button" id="btn_tambah" class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>Arsipkan Surat</button>
                        </div>
                    </div>
                </div>
                <div id="tmbharsip" class="col-lg-12 m-t-15">
                    <div class="card">
                        <div class="card-header">
                            <strong>Tambah Arsip Surat</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('simpanarsip')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nomorsurat" class=" form-control-label">Nomor Surat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nomorsurat" name="nomorsurat" placeholder="Nomor Surat" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Kategori</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kategori" id="kategori" class="form-control">
                                            <option disabled selected value="">-- Pilih Kategori --</option>
                                            <option value="Pengumuman">Pengumuman</option>
                                            <option value="Undangan">Undangan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="judul" class=" form-control-label">Judul</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="judul" name="judul" placeholder="Judul Surat" class="form-control">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>
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
                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>{{$tanggal}}</h3>

                            </div>
                            <div class="au-task js-list-load ">
                                <div class="row m-t-25 m-l-20">
                                    <form class="form-header" action="{{url('/')}}" method="GET">
                                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Cari Surat" />
                                        <button class="au-btn--submit" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="table-responsive table--no-card m-l-20 m-r-20 m-t-25 m-b-40">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Surat</th>
                                                <th>Kategori</th>
                                                <th>Judul</th>
                                                <th>Waktu Pengarsipan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach($query as $p)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$p->arsip_nomor}}</td>
                                                <td>{{$p->arsip_kategori}}</td>
                                                <td>{{$p->arsip_judul}}</td>
                                                <td>{{$p->arsip_waktu}}</td>
                                                <td>
                                                    <a href="#" class=" ml-2 btn btn-sm btn-danger" id="btnDelete" name="btnDelete" data-id="{{$p->arsip_id}}" data-toggle="tooltip" title="Hapus">
                                                        <i class="fas fa-trash" aria-hidden="true"></i></a>
                                                    <a href="{{asset('file_surat/'.$p->arsip_file)}}" download class=" ml-2 btn btn-sm btn-warning" id="unduh" name="unduh" data-toggle="tooltip" title="Unduh">
                                                        <i class="fas fa-download" aria-hidden="true"></i></a>
                                                    <a href="{{url('lihat_surat',$p->arsip_id)}}" class=" ml-2 btn btn-sm btn-info" id="lihat" name="lihat" data-toggle="tooltip" title="Lihat">
                                                        <i class="fas fa-eye" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $('#tmbharsip').hide();
    $(document).on('click', '#btn_tambah', function(e) {
        $('#tmbharsip').show();
        $('#btn_tambah').hide();
    });
    $(document).on('click', '#btnbatal', function(e) {
        $('#tmbharsip').hide();
        $('#btn_tambah').show();
    });
    $('body').on('click', '#btnDelete', function() {
        var cek = $(this).data('id');
        console.log(cek);
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Kamu tidak dapat mengembalikan data ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{url('arsip/delete')}}/" + cek,
                    type: "GET",
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        Swal.fire(
                            'Terhapus!',
                            'Data anda berhasil di hapus.',
                            'success'
                        )
                        location.reload(true);
                    }
                });
            } else {
                Swal.fire("Cancelled", "Your data is safe :)", "error");
            }
        });

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