@extends('layouts.main')
@section('container')
<div class="card-body">
    <h5>Tambah User</h5>
    <hr>
      <form method="post" action="/users">
        @csrf
        <div class="col-md-9">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="" required autofocus>
            <label for="name">Nama</label>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="" required>
            <label for="username">Nama Pengguna</label>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
            <label for="password">Password</label>
          </div>
        </div>       
            {{-- <input type="hidden" class="form-control" id="status" name="status" placeholder="" value="tersedia"> --}}
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