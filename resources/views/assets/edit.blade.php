@extends('layouts.main')
@section('container')
<div class="card-body">
    <h5>Edit Barang</h5>
    <hr>
  <form method="post" action="/asets/{{ $asset->kode }}">
    @method('put')
    @csrf
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Kode Barang</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="kode" name="kode"  value="{{ old('kode', $asset->kode) }} "required readonly>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Nama Barang</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="nama" name="nama"  value="{{ old('nama', $asset->nama) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Tipe Barang</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="tipe" name="tipe"  value="{{ old('tipe', $asset->tipe) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Ukuran Barang</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="ukuran" name="ukuran"  value="{{ old('ukuran', $asset->ukuran) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Bahan Barang</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="bahan" name="bahan"  value="{{ old('bahan', $asset->bahan) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Tahun </label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="tahun" name="tahun"  value="{{ old('tahun', $asset->tahun) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Asal Usul Barang</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="asal" name="asal"  value="{{ old('asal', $asset->asal) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Keterangan</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="keterangan" name="keterangan"  value="{{ old('keterangan', $asset->keterangan) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <div class="col-5 pb-2 pt-2">
        <a href="/asets" class="btn btn-danger d-flex float-end">Kembali</a>
      </div>
      <div class="col-5 pb-2 pt-2">
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </div>
  </form>
</div>
@endsection
