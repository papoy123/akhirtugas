@extends('layouts.master')
 @section('content')
     <div class="container mt-5">
         <div class="row">
             <div class="col-md-12">
                 <div>
                     <h3 class="text-center my-4">Daftar Pulsa</h3>
                    
                     <hr>
                 </div>
                 <div class="card border-0 shadow-sm rounded">
                     <div class="card-body">
                  <!-- // Menambah Tombol untuk tambah data dan juga fungsi route create -->
                         <a href="{{ route('pakets.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th scope="col">Gambar</th>
                                     <th scope="col">Nama</th>
                                     <th scope="col">Paket</th>
                                     <th scope="col">Harga</th>
                                 <!-- // Menambah kolom untuk Aksi -->
                                     <th scope="col">AKSI</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 