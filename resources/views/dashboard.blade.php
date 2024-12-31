@extends('layouts.main')
@section('container')


  <div class="row">
    @can('admin')
    <div class="col">

          <div class="card-body card border-0 zoom-in shadow-none" style="background-color: #79AC78">
            <div class="text-center">
              <img src="{{ asset('assets/images/user.png') }}" width="50" height="50" class="mb-3" alt="">
              <h4 class="fw-semibold fs-3  mb-1">Pengguna</h4>
              <h5 class="fw-semibold  mb-0">{{ $totalUsers }}</h5>
            </div>
          </div>
    </div>
    @endcan
    <div class="col">
        <div class="card-body card border-0 zoom-in shadow-none" style="background-color: #79AC78">
            <div class="text-center">
              <img src="{{ asset('assets/images/aset.png') }}" width="50" height="50" class="mb-3" alt="">
              <h5 class="fw-semibold fs-3  mb-1 " >Aset</h5>
              <h5 class="fw-semibold  mb-0">{{ $totalAsets }}</h5>
            </div>
          </div>
    </div>
    <div class="col">
        <div class="card-body card border-0 zoom-in shadow-none" style="background-color: #79AC78">
            <div class="text-center">
              <img src="{{ asset('assets/images/history.png') }}" width="50" height="50" class="mb-3" alt="">
              <h4 class="fw-semibold fs-3 mb-1">Riwayat</h4>
              @can('admin')
              <h5 class="fw-semibold mb-0">{{ $totalRiwayatsA }}</h5>
              @else
              <h5 class="fw-semibold mb-0">{{ $totalRiwayats }}</h5>

              @endcan
            </div>
          </div>
    </div>
  </div>
          <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div id="chart">
                  {!! $chart->container() !!}
                </div>
              </div>
            </div>
          </div>
        </div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
@endsection
