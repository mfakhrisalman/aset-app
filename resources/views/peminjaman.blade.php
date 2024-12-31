@extends('layouts.main')
@section('container')
<style>
    .scanner {
    width: 100%;
    height: 300px; /* Sesuaikan tinggi dengan kebutuhan Anda */
    position: relative;
    overflow: hidden;
  }
  
  .video-container {
    width: 100%;
    height: 100%;
    position: relative;
  }
  
  .video-container video {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .laser {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px; /* Sesuaikan tinggi dengan kebutuhan Anda */
    background: red; /* Warna laser */
    animation: laserAnimate 2s infinite;
  }
  
  @keyframes laserAnimate {
    0% {
      transform: translateY(0);
      opacity: 0;
    }
    10% {
      transform: translateY(0);
      opacity: 1;
    }
    90% {
      transform: translateY(100%);
      opacity: 1;
    }
    100% {
      transform: translateY(100%);
      opacity: 0;
    }
  }
  </style>
  <div class="container col-lg-4" >
    <div class="card bg-white shadow rounded-3 p-3 border-0">
      @if(session()->has('gagal'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('gagal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session()->has('sukses'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
  
      <div class="wrapper" >
        <div class="scanner" >
          <video id="preview"></video>
        </div>
      </div>
    </div>
  </div>
  <form action="/peminjaman/barcode" method="post" id="form">
    @csrf
    <input type="hidden" name="kode" id="kode">
  </form>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function(c){
      document.getElementById('kode').value = c;
      document.getElementById('form').submit();
    });

    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
        let laser = document.createElement('div');
        laser.classList.add('laser');
        document.querySelector('.scanner').appendChild(laser);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });
  </script>
@endsection