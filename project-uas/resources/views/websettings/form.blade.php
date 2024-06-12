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
    <label class="col-md-4 col-xs-4 col-form-label justify-content-md-end">Logo Web <span class="text-danger">*</span></label>
    <div class="col-12 col-md-5 col-lg-5">
        <input type="file" name="logo_web" id="logo_web" class="form-control-file @error('logo_web') is-invalid @enderror" accept="image/*" value="{{ isset($websettings->logo_web) ? $websettings->logo_web : old('logo_web') }}">
        @if(isset($websettings->logo_web))
            <img id="logo_web-preview" src="{{ asset('storage/' . $websettings->logo_web) }}" alt="Preview" style="max-width: 150px; max-height: 200px;">
        @else
            <img id="logo_web-preview" src="#" alt="Preview" style="display: none; max-width: 150px; max-height: 200px;">
        @endif
        @error('logo_web')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('logo_web') }}</strong>
            </span>
        @enderror
    </div>
</div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Nama Website <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="nama_web" class="form-control{{ $errors->has('nama_web') ? ' is-invalid' : '' }}" value="{{ old('nama_web', $websettings->nama_web ?? '') }}" placeholder="Nama Website" required>
            @if ($errors->has('nama_web'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama_web') }}</strong>
                </span>
            @endif
            <small><cite title="Source Title">Anda bisa gunakan parameter italic, bold, dan underline</small>
        </div> 
    </div> 
   
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Subnama Web <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="subnama_web" class="form-control{{ $errors->has('subnama_web') ? ' is-invalid' : '' }}" value="{{ old('subnama_web', $websettings->subnama_web ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('subnama_web'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('subnama_web') }}</strong>
                </span>
            @endif
        </div> 
    </div> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Nama Instansi <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="nama_instansi" class="form-control{{ $errors->has('nama_instansi') ? ' is-invalid' : '' }}" value="{{ old('nama_instansi', $websettings->nama_instansi ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('nama_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama_instansi') }}</strong>
                </span>
            @endif
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Alamat Instansi <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="alamat_instansi" class="form-control{{ $errors->has('alamat_instansi') ? ' is-invalid' : '' }}" value="{{ old('alamat_instansi', $websettings->alamat_instansi ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('alamat_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('alamat_instansi') }}</strong>
                </span>
            @endif
        </div> 
    </div> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">No. Telepon Instansi <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="telp_instansi" class="form-control{{ $errors->has('telp_instansi') ? ' is-invalid' : '' }}" value="{{ old('telp_instansi', $websettings->telp_instansi ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('telp_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('telp_instansi') }}</strong>
                </span>
            @endif
        </div> 
    </div> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Alamat Web Instansi <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="web_instansi" class="form-control{{ $errors->has('web_instansi') ? ' is-invalid' : '' }}" value="{{ old('web_instansi', $websettings->web_instansi ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('web_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('web_instansi') }}</strong>
                </span>
            @endif
        </div> 
    </div> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">Email Instansi <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="email_instansi" class="form-control{{ $errors->has('email_instansi') ? ' is-invalid' : '' }}" value="{{ old('email_instansi', $websettings->email_instansi ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('email_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email_instansi') }}</strong>
                </span>
            @endif
        </div> 
    </div> 
    <div class="form-group row">
        <label class="col-md-4 col-xs-4 col-form-label">HR Manajer Instansi <span class="text-danger">*</span></label> 
        <div class="col-12 col-md-5 col-lg-5">
            <input type="text" name="hr_instansi" class="form-control{{ $errors->has('hr_instansi') ? ' is-invalid' : '' }}" value="{{ old('hr_instansi', $websettings->hr_instansi ?? '') }}" placeholder="Sibnama Web" required>
            @if ($errors->has('hr_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hr_instansi') }}</strong>
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