@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 border-bottom">
    <h3>Edit Album</h3>
</div>
<br>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Album</h4>
        </div>

        <form method="post" action="/admin/album/{{$album->AlbumID}}" class="mb-5" enctype="multipart/form-data">
          {{ method_field('PUT') }}
            @csrf
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label for="NamaAlbum" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Album</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control @error('NamaAlbum') is-invalid @enderror" type="text" id="NamaAlbum" name="NamaAlbum" value="{{$album->NamaAlbum}}">
                    </div>
                </div>
                @error('NamaAlbum')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="form-group row mb-4">
                    <label for="Deskripsi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea id="Deskripsi" type="hidden" class="summernote-simple" name="Deskripsi">{{$album->Deskripsi}}</textarea>
                        {{-- <script>
                            $(document).ready(function() {
                                $('.summernote-simple').summernote();
                            });
                        </script> --}}
                    </div>
                </div>

                <div class="form-group row mb-4">
                  <label for="TanggalDibuat" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Unggah</label>
                  <div class="col-sm-12 col-md-7">
                      <input type="datetime-local" class="form-control @error('TanggalDibuat') is-invalid @enderror" type="text" id="TanggalDibuat" name="TanggalDibuat" value="{{old('TanggalDibuat', $album->TanggalDibuat)}}">
                  </div>
              </div>
              @error('TanggalDibuat')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
        
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
        
      </div>
    </div>
  </div>
    
@endsection