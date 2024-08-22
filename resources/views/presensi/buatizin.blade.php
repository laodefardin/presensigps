@extends('layouts.presensi')
@section('header')
    <link rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> --}}
    
    <style>
        .datepicker-modal {
            max-height: 430px !important;
        }

        .datepicker-date-display {
            background-color: #c63e53 !important;
        }
    </style>

    {{-- App Header --}}
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Form Izin
        </div>
        <div class="right"></div>
    </div>
    {{-- App Header --}}
@endsection

@section('content')
    <div class="row" style="margin-top:70px">
        <div class="col">
            <form action="/presensi/storeizin" method="POST" id="frmizin">
                @csrf
                <div class="form-group">
                    <input type="text" name="tgl_izin" value="{{ old('tgl_izin') }}" id="tgl_izin" class="form-control datepicker"
                        placeholder="Tanggal Izin" >
                        @error('tgl_izin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="status" id="status" class="form-control validate">
                        <option value="">Izin / Sakit</option>
                        <option value="i">Izin</option>
                        <option value="s">Sakit</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" placeholder="Keterangan"></textarea>
                    @error('keterangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary w-100" name="submit" id="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@push('myscript')
    <script>
        var currYear = (new Date()).getFullYear();

        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd"
            });
        });

        $("#tgl_izin").change(function(e) {
            var tgl_izin = $(this).val();
            $.ajax({
                type: 'POST',
                url: '/presensi/cekpengajuanizin',
                data: {
                    _token: "{{  csrf_token() }}",
                    tgl_izin: tgl_izin
                },
                cache: false,
                success: function(respond){
                    if (respond == 1) {
                        Swal.fire({
                            title: 'Oops!',
                            text: 'Anda Sudah Melakukan Input Pengajuan Izin Pada Tanggal Tersebut',
                            icon: 'warning'
                        }).then((result) => {
                            $("#tgl_izin").val("");
                        });
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#frmizin").submit(function() {
                var tgl_izin = $("#tgl_izin").val();
                var status = $("#status").val();
                var keterangan = $("#keterangan").val();

                if (tgl_izin == "") {
                    alert("Tanggal Harus Diisi");
                    return false;
                }
                elseif(status == "") {
                    alert("Status Harus Diisi");
                    return false;
                }
                elseif(keterangan == "") {
                    alert("Keterangan Harus Diisi");
                    return false;
                }
            });
        });
    </script>
@endpush
