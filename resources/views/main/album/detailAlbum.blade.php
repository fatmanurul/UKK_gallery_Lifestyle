@extends('main.layouts.main')
  
@section('container')

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">Detail Album</h2>
    </div>

    <div class="row pb-3">
      <div class="col-12">
          <div class="card mb-4">
              <div class="card-header p-4">
                  <h4>Judul Album : {{$photos[0]->NamaAlbum}}</h4>
              </div>
              <div class="card-body text-center">
                  <blockquote class="blockquote mb-0">
                      <p><h5>Deskripsi Album :{{$photos[0]->Deskripsi}}</h5></p>
                      <footer class="blockquote-footer"> <cite title="Source Title">Tanggal Unggah : {{$photos[0]->TanggalDibuat}}</cite></footer>
                  </blockquote>
              </div>
          </div>
      </div>
  </div>

    <div class="row mb-4">
        @foreach ($photos as $photo)
        <div class="col-md-4">
            <div class="card mb-4">
                <img class="card-img-top" src="{{asset('storage/photo-images/'.$photo->LokasiFile)}}" alt="Photo" style="width: 100%;" />
                <div class="card-body">
                    <h5 class="card-title">Judul Foto : {{$photo->JudulFoto}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>

@endsection