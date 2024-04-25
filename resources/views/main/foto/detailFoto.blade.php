@extends('main.layouts.main')
  
@section('container')

<div class="container-fluid tm-container-content tm-mt-60">
    @foreach ($photos as $photo)
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">Detail Foto : {{ $photo->JudulFoto }}</h2>
    </div>
    <div class="row pb-3">
      <div class="col-12">
          <div class="card mb-4">
              <div class="card-header p-4">
                    <h4>Judul Foto : {{ $photo->JudulFoto }}</h4>
                </div>
                <div class="card-body text-center">
                  <blockquote class="blockquote mb-0">
                    <p><h5>Deskripsi Foto : {{ $photo->DeskripsiFoto }}</h5>
                        <h5>Nama Album : {{ $photo->NamaAlbum }}</h5></p>
                    <footer class="blockquote-footer"> <cite title="Source Title">Tanggal Unggah : {{ $photo->TanggalUnggah }}</cite></footer>
                  </blockquote>
                  <small class="mr-3 like-icon"><a href="/foto/{{$photo->FotoID}}/like"><i class="fa fa-heart text-primary">{{$like}}</i></a></small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                   Komentar
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Nama: <b>{{ $comment->cmn_name }}</b></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Komentar: <b>{{ $comment->IsiKomentar }}</b></h6>
                            {{-- <p class="card-text">Komentar: <b>{{ $comment-> }}</b></p> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="card-body p-4">
            <form id="commentForm" method="post" action="/foto/{{ $foto_id }}" class="mb-5" data-parsley-validate>
                @csrf
                <div class="text-center ml-5 mr-5">
                <h5><b><p style="font-family:Perpetua; color:RGB(160, 97, 36); margin-top:100px;">
                    Tulis Tanggapanmu !
                </p></b></h5>
                </div>
                <small style="line-height:5px"></small>
                <div class="form-floating mb-3">
                    <label for="floatingTextarea2">Komentar</label>
                    <textarea class="form-control @error('IsiKomentar') is-invalid @enderror" id="IsiKomentar" name="IsiKomentar" style="height: 100px" required data-parsley-inputs data-parsley-trigger="keyup">{{ old('IsiKomentar') }}</textarea>
                    @error('IsiKomentar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
               
                <div class="form-floating mb-3">
                    <button type="submit" class="btn btn-primary custom-button">Kirim</button>
                </div>
            </div>
            </form>
        </div> 
    </div>
</div>
@endforeach
@endsection