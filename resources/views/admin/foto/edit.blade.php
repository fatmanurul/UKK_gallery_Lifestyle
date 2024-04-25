@extends('admin.layouts.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
@section('container')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
             <div class="card">
                <div class="card-header">
                  <h4>Edit Foto</h4>
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

        <form method="post" action="/admin/foto/{{$photo->FotoID}}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label for="JudulFoto" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul photo</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control @error('JudulFoto') is-invalid @enderror" type="text" id="JudulFoto" name="JudulFoto" value="{{$photo->JudulFoto}}">
                    </div>
                </div>
                @error('JudulFoto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="form-group row mb-4">
                    <label for="DeskripsiFoto" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea id="DeskripsiFoto" type="hidden" class="summernote-simple" name="DeskripsiFoto">{{$photo->DeskripsiFoto}}</textarea>
                        <script>
                            $(document).ready(function() {
                                $('.summernote-simple').summernote();
                            });
                        </script>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="LokasiFile" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi file</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control @error('LokasiFile') is-invalid @enderror" type="file" id="LokasiFile" name="LokasiFile" value="{{$photo->LokasiFile}}" onchange="previewImage()">
                    </div>
                </div>
                @error('LokasiFile')
                <div class="invalid-feedback col-md-7 offset-md-3">
                    {{ $message }}
                </div>
                @enderror
                
                <div class="form-group row mb-4">
                    <label for="formFile" class="form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Unggah</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="datetime-local" name="TanggalUnggah" id="TanggalUnggah" name="TanggalUnggah" value="{{$photo->TanggalUnggah}}">
                    </div>
                </div>
                @error('TanggalUnggah')
                <div class="invalid-feedback col-md-7 offset-md-3">
                    {{ $message }}
                </div>
                @enderror
                
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album</label>
                    <div class="col-sm-12 col-md-7">
                      <select class="form-select" name="AlbumID">
                       <option disable value="">Pilih Album</option>
                       @foreach ($album as $item)
                           <option value="{{ $item->AlbumID }}">{{ $item->NamaAlbum }}</option>
                       @endforeach
                      </select>
                    </div>
                  </div>               
        
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <a href="/admin/foto" class="btn btn-warning" style="color: white">kembali</a>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                </div>
            </div>
        </form>
        
    </section>
</div>

@endsection