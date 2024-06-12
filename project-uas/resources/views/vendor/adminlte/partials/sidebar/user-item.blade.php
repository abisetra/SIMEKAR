<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image d-flex align-items-center justify-content-center">
        <img src="{{ Auth::user()->adminlte_image() }}" class="brand-image img-circle elevation-3" alt="User Image" style="width: 50px; height: 50px;">
    </div>
    <div class="info d-flex align-items-center">
        <div class="text-wrapper">
            <a href="#" class="d-block text-center" style=" color: white; font-size: 20px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 150px;">{{ Auth::user()->name }}</a>
        </div>
    </div>
</div>
