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
        <label class="col-md-4 col-xs-4 col-form-label justify-content-end">Tanggal Cuti <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="tgl_mulai_cuti" class="datepicker form-control @error('tgl_mulai_cuti') is-invalid @enderror" value="{{ old('tgl_mulai_cuti', isset($cuti) ? \Carbon\Carbon::parse($cuti->tgl_mulai_cuti)->format('d-m-Y') : '') }}" autocomplete="off">
                        <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    </div>
                    @error('tgl_mulai_cuti')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tgl_mulai_cuti') }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <strong>SAMPAI</strong>
                </div>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="tgl_selesai_cuti" class="datepicker form-control @error('tgl_selesai_cuti') is-invalid @enderror" value="{{ old('tgl_selesai_cuti', isset($cuti) ? \Carbon\Carbon::parse($cuti->tgl_selesai_cuti)->format('d-m-Y') : '') }}" autocomplete="off">
                        <span class="input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    </div>
                    @error('tgl_selesai_cuti')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tgl_selesai_cuti') }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Keterangan <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="deskripsi_cuti" class="form-control @error('deskripsi_cuti') is-invalid @enderror" value="{{ old('deskripsi_cuti', $cuti->deskripsi_cuti ?? '') }}" placeholder="Cakit...">
            @error('deskripsi_cuti')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('deskripsi_cuti') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @can('hrd')
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Status <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status_pengajuan_cuti" class="form-control select2 @error('status_pengajuan_cuti') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Cuti::$statusCutiKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('status_pengajuan_cuti', $cuti->status_pengajuan_cuti ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('status_pengajuan_cuti')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('status_pengajuan_cuti') }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endcan
    @can('admin')
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label justify-flex-end">Status <span class="text-danger">*</span></label>
        <div class="col-12 col-md-5 col-lg-5">
            <select name="status_pengajuan_cuti" class="form-control select2 @error('status_pengajuan_cuti') is-invalid @enderror">
                <option value=""></option>
                @foreach (\App\Models\Cuti::$statusCutiKaryawanOptions as $key => $value)
                <option value="{{ $key }}" {{ old('status_pengajuan_cuti', $cuti->status_pengajuan_cuti ?? '') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @error('status_pengajuan_cuti')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('status_pengajuan_cuti') }}</strong>
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