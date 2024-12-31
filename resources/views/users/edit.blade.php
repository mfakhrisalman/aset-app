@extends('layouts.main')
@section('container')
<div class="card-body">
    <h5>Edit Pengguna</h5>
    <hr>
  <form method="post" action="/users/{{ $user->id }}">
    @method('put')
    @csrf
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Nama Pengguna</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="username" name="username"  value="{{ old('username', $user->username) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Nama</label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="name" name="name"  value="{{ old('name', $user->name) }} "required>
        </div>
    </div>
    <div class="form-group row align-items-center mb-0">
      <label  class="col-2 text-start control-label col-form-label">Password </label>
        <div class="col-8 border-start pb-2 pt-2">
          <input type="text" class="form-control" id="password" name="password"  value="Masukkan Password Baru" required>
        </div>
    </div>

    <div class="form-group row align-items-center mb-0">
      <div class="col-5 pb-2 pt-2">
        <a href="/users" class="btn btn-danger d-flex float-end">Kembali</a>
      </div>
      <div class="col-5 pb-2 pt-2">
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </div>
  </form>
</div>
@endsection
