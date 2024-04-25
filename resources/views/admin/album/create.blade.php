@extends('admin.layouts.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
@section('container')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
             <div class="card">
                <div class="card-header">
                  <h4>Tambah Album</h4>
                  @if(session()->has('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
      @endif
  
      @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
                </div>
        <form method="post" action="/admin/album" class="mb-5" enctype="multipart/form-data" data-parsley-validate>
                  @csrf
                <div class="mb-3 ml-4 mr-4">
                    <label for="formFile" class="form-label">Nama Album</label>
                    <input class="form-control @error ('NamaAlbum') is-invalid @enderror" id="NamaAlbum" name="NamaAlbum"  autofocus value="{{old('NamaAlbum')}}">
                  </div>
                  <div class="mb-3 ml-4 mr-4">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error ('Deskripsi') is-invalid @enderror" id="Deskripsi" name="Deskripsi"  autofocus value="{{old('Deskripsi')}}"rows="3"></textarea>
                    <div class="mb-3 mt-4 ml-4 mr-4">
                        <label for="formFile" class="form-label">Tanggal Dibuat</label>
                        <input type="datetime-local" name="TanggalDibuat" id="TanggalDibuat" name="TanggalDibuat" >
                    </div>
                  </div>
                <div class="card-body">
                  <a href="/admin/foto" class="btn btn-warning" style="color: white">kembali</a>
                  {{-- <a href="/admin/foto/create" class="btn btn-primary mb-4 mt-4">Tambah</a> --}}
                  <button type="submit" class="btn btn-primary mb-4 mt-4">Tambah</button>
                </div>
              </div>
          </form>
        </div>
    </section>
  </div>


@endsection