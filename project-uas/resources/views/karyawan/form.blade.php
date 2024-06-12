<div class="card-body">
    <div class="card card-solid">
        <div class="card-body pb-0 pt-0">
            <blockquote>
                <b>Keterangan!!</b><br>
                <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span class="text-danger">*</span>) Harus Di Isi !!</cite></small>
            </blockquote>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-content-md-end">Foto <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror" accept="image/*" value="{{ isset($karyawan->photo) ? $karyawan->photo : old('photo') }}">
            @if(isset($karyawan->photo))
            <img id="photo-preview" src="{{ asset('storage/' . $karyawan->photo) }}" alt="Preview" style="max-width: 150px; max-height: 200px;">
            @else
            <img id="photo-preview" src="#" alt="Preview" style="display: none; max-width: 150px; max-height: 200px;">
            @endif
            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="nama_karyawan" class="form-control @error('nama_karyawan') is-invalid @enderror" value="{{ old('nama_karyawan', $karyawan->nama_karyawan ?? '') }}" placeholder="Nama lengkap.." autocomplete="off">
            @error('nama_karyawan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_karyawan') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Email <span class="text-red">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="email_karyawan" class="form-control @error('email_karyawan') is-invalid @enderror" value="{{ old('email_karyawan', $karyawan->email_karyawan ?? '') }}" placeholder="Masukan email karyawan.." autocomplete="off">
            @error('email_karyawan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email_karyawan') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">NIK <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $karyawan->nik ?? '') }}" placeholder="NIK.." autocomplete="off">
            @error('nik')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nik') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Jenis Kelamin <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="jenis_kelamin" class="form-control select2 @error('jenis_kelamin') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Karyawan::$jeniskelaminKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('jenis_kelamin', $karyawan->jenis_kelamin ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('jenis_kelamin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Agama <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="agama" class="form-control select2 @error('agama') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Karyawan::$agamaKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('agama', $karyawan->agama ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('agama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('agama') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tempat, Tanggal Lahir <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="kota_lahir" class="form-control @error('kota_lahir') is-invalid @enderror" value="{{ old('kota_lahir', $karyawan->kota_lahir ?? '') }}" autocomplete="off">
                    @error('kota_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('kota_lahir') }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="tgl_lahir" class="datepicker form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', isset($karyawan) ? \Carbon\Carbon::parse($karyawan->tgl_lahir)->format('d-m-Y') : '') }}" autocomplete="off">
                        <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    </div>
                    @error('tgl_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tgl. Mulai Kerja <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <div class="input-group">
                <input type="text" name="tgl_masuk" class="datepicker form-control @error('tgl_masuk') is-invalid @enderror" value="{{ old('tgl_masuk', isset($karyawan) ? \Carbon\Carbon::parse($karyawan->tgl_masuk)->format('d-m-Y') : '') }}" autocomplete="off">
                <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                </span>
            </div>
            @error('tgl_masuk')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tgl_masuk') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">No. Telp <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $karyawan->telepon ?? '') }}" placeholder="0823...">
            @error('telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('telepon') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Jabatan <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="jabatan_id" class="form-control select2 @error('jabatan_id') is-invalid @enderror">

                @foreach ($jabatan as $item)
                <option value="{{ $item->id }}" {{ $item->id == old('jabatan_id', $karyawan->jabatan_id ?? '') ? 'selected' : '' }}>{{ $item->jabatan_name }}</option>
                @endforeach
            </select>
            @error('jabatan_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jabatan_id') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Departement <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="departement_id" class="form-control select2 @error('departement_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($departement as $item)
                <option value="{{ $item->id }}" {{ $item->id == old('departement_id', $karyawan->departement_id ?? '') ? 'selected' : '' }}>{{ $item->departement_name }}</option>
                @endforeach
            </select>
            @error('departement_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('departement_id') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Status Karyawan <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status_karyawan" class="form-control select2 @error('status_karyawan') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Karyawan::$statusKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('status_karyawan', $karyawan->status_karyawan ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('status_karyawan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('status_karyawan') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Alamat <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan alamat..">{{ old('alamat', $karyawan->alamat ?? '') }}</textarea>
            @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Kota <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="kota_asal" class="form-control @error('kota_asal') is-invalid @enderror" value="{{ old('kota_asal', $karyawan->kota_asal ?? '') }}" placeholder="Kota Asal..">
            @error('kota_asal')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('kota_asal') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @if (!isset($karyawan->users_id))
    <div class="form-group row">
        <div class="col-12 col-md-5 col-lg-5 offset-md-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="makeUserAccount" value="true" {{ old('makeUserAccount') ? 'checked' : '' }} class="toggle-form-user"> Buat akun untuk karyawan ini.
                </label>
            </div>
        </div>
    </div>
    @endif
    <div id="form-user" style="display: none">
        <hr>
        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Password <span class="text-red">*</span></label>
            <div class="col-12 col-md-5 col-lg-5">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') ?? '' }}" placeholder="Masukan password.." disabled>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Level User <span class="text-red">*</span></label>
            <div class="col-12 col-md-5 col-lg-5">
                <select name="role_id" class="form-control select2 @error('role_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach ($roles as $item)
                    <option value="{{ $item->id }}" {{ $item->id == old('role_id', isset($users) ? $users->first()->role_id : '') ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role_id') }}</strong>
                </span>
                @enderror
            </div>
        </div>

    </div>
</div>
<div class="card-footer" id="submitSectionForm1">
    <div class="offset-md-4">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>