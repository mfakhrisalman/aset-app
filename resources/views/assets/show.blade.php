@extends('layouts.main')
@section('container')
<div class="card-body">
    <h5>Detail Barang</h5>
    <hr>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Kode Barang</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->kode }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Nama Barang</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->nama }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Tipe Barang</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->tipe }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Ukuran Barang</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->ukuran }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Bahan Barang</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->bahan }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Tahun </label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->tahun }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Asal Usul Barang</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->asal }}
      </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Keterangan</label>
      <div class="col-9 border-start pb-2 pt-2">
        {{ $asset->keterangan }}
      </div>
    </div>

</div>
  <a href="/asets" class="">Kembali</a>

  @endsection