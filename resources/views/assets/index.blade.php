@extends('layouts.main')
@section('container')
<div class="card-body p-3">
  <div class="d-flex justify-content-start align-items-center mb-9">
    @can('admin')
    <form class="position-relative">
      <a href="/asets/create" class="justify-content-center w-100 btn mb-1 btn-rounded btn-primary d-flex align-items-center">
        <i class="ti ti-plus fs-4 me-2"></i>
        Data Aset
      </a>
    </form>
    @endcan
  </div>
  <div class="table-responsive border rounded">
    <table class="table align-middle text-nowrap mb-0">
      <thead>
        <tr class="text-black" style="background-color: #79AC78;">

          <th scope="col">No</th>
          @can('admin')
          <th scope="col">Kode Barang</th>
          @endcan
          <th scope="col">Nama Barang</th>
          <th scope="col">Asal Usul</th>
          <th scope="col">Status</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($assets as $asset)
        <tr>
          <td>
            <p class="mb-0">{{ $loop->iteration }}</p>
          </td>
          @can('admin')
          @if(auth()->user()->is_admin)
          <td>
            <p class="mb-0">{!! DNS2D::getBarcodeHTML("$asset->kode", 'QRCODE') !!}</p>
          </td>
          @else
          <td>
            <p class="mb-0">{{ $asset->kode }}</p>
          </td>
          @endif
          @endcan

          <td>
            <p class="mb-0">{{ $asset->nama }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $asset->asal }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $asset->status }}</p>
          </td>
          <td class="position-relative">
            <div class="d-flex justify-content-center">
              <a href="/asets/{{ $asset->kode }}" class="btn btn-secondary btn-circle btn-sm">
                <i class="fs-5 ti ti-eye"></i>
              </a>
              @can('admin')
              @if(auth()->user()->is_admin)
              <a href="/asets/{{ $asset->kode }}/edit" class="ms-3 btn btn-success btn-circle btn-sm">
                <i class="fs-5 ti ti-edit"></i>
              </a>
              <form action="/asets/{{ $asset->kode }}" method="post">
                @method('delete')
                @csrf
                <button class="ms-3 btn btn-danger btn-circle btn-sm">
                  <i class="fs-5 ti ti-trash"></i>
                </button>
              </form>
              @endif
              @endcan
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="d-flex align-items-center justify-content-end mt-2">
      {{ $assets->links() }}
    </div>
  </div>
</div>
@endsection
