<form action="/karyawan/{{ $karyawan->id }}/update" method="post" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="id" value="{{ $karyawan->id }}">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                        <path d="M3 7l9 6l9 -6" />
                    </svg>
                </span>
                <input type="text" value="{{ $karyawan->email }}" id="email" name="email"
                    class="form-control" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    </svg>
                </span>
                <input type="text" value="{{ $karyawan->nama_lengkap }}" id="nama_lengkap" name="nama_lengkap"
                    class="form-control" placeholder="Nama Karyawan">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-analytics">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                        <path d="M7 20l10 0" />
                        <path d="M9 16l0 4" />
                        <path d="M15 16l0 4" />
                        <path d="M8 12l3 -3l2 2l3 -3" />
                    </svg>
                </span>
                <input type="text" value="{{ $karyawan->jabatan }}" id="jabatan" name="jabatan"
                    class="form-control" placeholder="Jabatan">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                    </svg>
                </span>
                <input type="text" value="{{ $karyawan->no_hp }}" id="no_hp" name="no_hp"
                    class="form-control" placeholder="No HandPhone">
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <input type="file" name="foto" id="foto" class="form-control">
            <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <select name="kode_dept" id="kode_deptt" class="form-select">
                <option value="">Departemen</option>
                @foreach ($departemen as $d)
                    <option {{ $karyawan->kode_dept == $d->kode_dept ? 'selected' : '' }}
                        value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                @endforeach
            </select>
        </div>
    </div>

   


    <div class="row mt-2">
        <div class="col-12">
            <button class="btn btn-primary w-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 14l11 -11" />
                    <path
                        d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                </svg>
                Simpan
            </button>
        </div>
    </div>
</form>