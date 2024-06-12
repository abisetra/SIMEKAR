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
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Nama Karyawan <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="karyawan_id" class="form-control select2 @error('karyawan_id') is-invalid @enderror">
                <option value=""></option>
                @foreach ($karyawan as $item)
                <option value="{{ $item->id }}" {{ $item->id == old('karyawan_id', $teguran->karyawan_id ?? '') ? 'selected' : '' }}>{{ $item->nama_karyawan }}</option>
                @endforeach
            </select>
            @error('karyawan_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('karyawan_id') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Perihal Teguran <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="perihal_teguran" class="form-control @error('perihal_teguran') is-invalid @enderror" value="{{ old('perihal_teguran', $teguran->perihal_teguran ?? '') }}" placeholder="Cakit...">
            @error('perihal_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('perihal_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tanggal Teguran <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <div class="input-group">
                <input type="text" name="tgl_teguran" class="datepicker form-control @error('tgl_teguran') is-invalid @enderror" value="{{ old('tgl_teguran', isset($teguran) ? \Carbon\Carbon::parse($teguran->tgl_teguran)->format('d-m-Y') : '') }}" autocomplete="off">
                <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                </span>
            </div>
            @error('tgl_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tgl_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Deskripsi Teguran <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="deskripsi_teguran" class="form-control @error('deskripsi_teguran') is-invalid @enderror" value="{{ old('deskripsi_teguran', $teguran->deskripsi_teguran ?? '') }}" placeholder="Cakit...">
            @error('deskripsi_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('deskripsi_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @can('hrd')
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Status <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status_teguran" class="form-control select2 @error('status_teguran') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Teguran::$statusTeguranKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('status_teguran', $teguran->status_teguran ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('status_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('status_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tanggal Selesai Teguran <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <div class="input-group">
                <input type="text" name="tgl_selesai_teguran" class="datepicker form-control @error('tgl_selesai_teguran') is-invalid @enderror" value="{{ old('tgl_selesai_teguran', isset($teguran) ? \Carbon\Carbon::parse($teguran->tgl_selesai_teguran)->format('d-m-Y') : '') }}" autocomplete="off">
                <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                </span>
            </div>
            @error('tgl_selesai_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tgl_selesai_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endcan
    @can('admin')
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Status <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status_teguran" class="form-control select2 @error('status_teguran') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Teguran::$statusTeguranKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('status_teguran', $teguran->status_teguran ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('status_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('status_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Tanggal Selesai Teguran <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <div class="input-group">
                <input type="text" name="tgl_selesai_teguran" class="datepicker form-control @error('tgl_selesai_teguran') is-invalid @enderror" value="{{ old('tgl_selesai_teguran', isset($teguran) ? \Carbon\Carbon::parse($teguran->tgl_selesai_teguran)->format('d-m-Y') : '') }}" autocomplete="off">
                <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                </span>
            </div>
            @error('tgl_selesai_teguran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tgl_selesai_teguran') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endcan


    <div class="card-footer">
        <div class="offset-md-4">
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button>
                <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
            </div>
        </div>
    </div>