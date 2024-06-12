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
        <label class="col-md-4 col-xs-4 col-form-label">Jabatan Name <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="jabatan_name" class="form-control{{ $errors->has('jabatan_name') ? ' is-invalid' : '' }}" value="{{ old('jabatan_name', $jabatan->jabatan_name ?? '') }}" placeholder="Name Jabatan" required>
            @if ($errors->has('jabatan_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jabatan_name') }}</strong>
                </span>
            @endif
        </div> 
    </div> 
<div class="card-footer">
    <div class="offset-md-4">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-check-double mr-1"></i> Simpan</button> 
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo mr-1"></i> Reset</button>
        </div>
    </div>
</div>