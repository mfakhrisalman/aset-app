@extends('layouts.main')
@section('container')
<div class="card-body">
    <h5>Tambah Barang</h5>
    <hr>
      <form method="post" action="/asets">
        @csrf
        <div class="col-md-9">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="kode" name="kode" placeholder="" required autofocus>
            <label for="kode">Kode Barang</label>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
            <label for="tb-email">Nama Barang</label>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="asal" name="asal" placeholder="" required>
            <label for="asal">Asal Usul Barang</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tipe" name="tipe" placeholder="" required>
              <label for="tipe">Tipe Barang</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="bahan" name="bahan" placeholder="" required>
              <label for="bahan">Bahan Barang</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="" required>
              <label for="ukuran">Ukuran</label>
            </div>
          </div>       
          <div class="col-md-2">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="tahun" name="tahun" placeholder="" required>
              <label for="tb-email">Tahun</label>
            </div>
          </div> 
        </div>

        <div class="col-md-9">
          <div class="form-floating">
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="" required>
            <label for="keterangan">Keterangan</label>
          </div>
        </div>        
            <input type="hidden" class="form-control" id="status" name="status" placeholder="" value="Tersedia">
        <div class="col-12">
          <div class="d-md-flex align-items-center mt-3">

            <div class=" mt-3 mt-md-0">
              <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                <div class="d-flex align-items-center">
                  <i class="ti ti-device-floppy me-2 fs-4"></i>
                  Simpan
                </div>
              </button>
            </div>
          </div>
        </div>
    </form>
  </div>
@endsection