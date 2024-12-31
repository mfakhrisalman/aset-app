@extends('layouts.main')
@section('container')

<div class="table-responsive border rounded">
    <table class="table align-middle text-nowrap mb-0">
      <thead>
        <tr class="text-black" style="background-color: #79AC78;">
          <th scope="col">No</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Tanggal Dipinjam</th>
          <th scope="col">Tanggal Dikembalikan</th>
          <th scope="col">Status</th>
          @can('admin')
          <th scope="col">Peminjam</th>
          @endcan
        </tr>
      </thead>
      <tbody>
      @foreach ($riwayats as $riwayat)
        <tr>
          <td>
            <p class="mb-0"> {{ $loop->iteration }} </p>
          </td>
          <td>
            <p class="mb-0">{{ $riwayat->kode }}</p>
          </td>          
          <td>
            <p class="mb-0">{{ $riwayat->nama }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $riwayat->created_at }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $riwayat->updated_at }}</p>
          </td>
          <td>
            <p class="mb-0">{{ $riwayat->status }}</p>
          </td>
          @can('admin')
          <td>
            <p class="mb-0">{{ $riwayat->created_by }}</p>
          </td>
          @endcan
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex align-items-center justify-content-end mt-2">
      {{ $riwayats->links() }}
    </div>
</div>


@endsection
