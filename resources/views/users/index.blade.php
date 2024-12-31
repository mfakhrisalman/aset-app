@extends('layouts.main')
@section('container')
<div class="card-body p-3">
  <div class="d-flex justify-content-between align-items-center mb-9">
    <form class="position-relative">
      <a href="/users/create" class="justify-content-center w-100 btn mb-1 btn-rounded btn-primary d-flex align-items-center">
        <i class="ti ti-user-plus fs-4 me-2"></i>
        Data Pengguna
      </a>
    </form>
  </div> 
  <div class="table-responsive border rounded">
    <table class="table align-middle text-nowrap mb-0">
      <thead>
        <tr class="text-black" style="background-color: #79AC78;">
          <th scope="col">No</th>
          <th scope="col">Nama Pengguna</th>
          <th scope="col">Nama</th>
          <th scope="col">Password</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        <tr>
          <td>
            <p class="mb-0">{{ $loop->iteration }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $user->username }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $user->name }}</p>
          </td>          
          <td>
            <p class="mb-0">{{ $user->password }}</p>
          </td>
          <td class="d-flex align-items-center justify-content-center">        
            <a href="/users/{{ $user->id }}/edit" class="ms-3 btn btn-success btn-circle btn-sm">
              <i class="fs-5 ti ti-edit"></i>
            </a>            
            <form action="/users/{{ $user->id }}" method="post">
              @method('delete')
              @csrf
              <button class="ms-3 btn btn-danger btn-circle btn-sm">  
                <i class="fs-5 ti ti-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex align-items-center justify-content-end mt-2">
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection
