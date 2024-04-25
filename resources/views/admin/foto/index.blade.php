@extends('admin.layouts.main')
  
@section('container')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">

             <div class="card">
                <div class="card-header">
                  <h4>Foto</h4>
                </div>
                <div class="card-body">
          @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
          @endif
                  <a href="/admin/foto/create" class="btn btn-primary mb-4">Tambah</a>
                  <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul Foto</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal unggah</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Album</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
          @foreach ($photo as $photo)
           <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $photo->JudulFoto }}</td>
              <td>{{ $photo->DeskripsiFoto }}</td>
              <td>{{ $photo->TanggalUnggah }}</td>
              <td>{{ $photo->LokasiFile }}</td>
              <td>{{ $photo->NamaAlbum }}</td>
              <td>
              <a href="/admin/foto/{{ $photo->FotoID }}/edit" class="badge bg-warning"><i class="fas fa-edit"></i></a>
  
              <form action="/admin/foto/{{ $photo->FotoID }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin akan dihapus??')"><i class="fas fa-trash"></i></button>
              </form>
                </td>
            </tr>
            @endforeach
                    </tbody>
                  </table>
                </div>
              </div>


        </div>
    </section>
  </div>

@endsection