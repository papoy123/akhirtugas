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
                                 @forelse ($pakets as $artikel)
                                     <tr>
                                         <td class="text-center">
                                             <img src="{{ asset('/storage/pakets/' . $artikel->gambar) }}" class="rounded"
                                                 style="width: 50px">
                                         </td>
                                         <td>{{ $artikel->nama }}</td>
                                         <td>{{ $artikel->paket}}</td>
                                         <td>{{ $artikel->harga }}</td>
               <!-- // Menambah Bagian tombol show, edit dan delete beserta fungsi routenya -->
                                         <td class="text-center">
                                             <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                 action="{{ route('pakets.destroy', $artikel->id) }}" method="POST">
                                                 <a href="{{ route('pakets.show', $artikel->id) }}"
                                                     class="btn btn-sm btn-dark"><i class="bi bi-display"
                                                         style="color: white;"></i></a>
                                                 <a href="{{ route('pakets.edit', $artikel->id) }}"
                                                     class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"
                                                         style="color: white;"></i></a>
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"
                                                         style="color: white;"></i></button>
                                             </form>
                                         </td>
                                     </tr>
                                 @empty
                                     <div class="alert alert-danger">
                                         Data artikel belum Tersedia.
                                     </div>
                                 @endforelse
                             </tbody>
                         </table>
                         {{ $pakets->links() }}
                     </div>
                 </div>
             </div>
         </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

         <script>
             //message with toastr
             @if (session()->has('success'))

                 toastr.success('{{ session('success') }}', 'BERHASIL!');
             @elseif (session()->has('error'))

                 toastr.error('{{ session('error') }}', 'GAGAL!');
             @endif
         </script>
     @endsection