@extends('main.layouts.main')
  
@section('container')

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">Album</h2>
    </div>

    <div class="container-fluid pt-5 pb-3">
        <div class="row">
            <div class="col-12 text-center mb-2">
                <ul class="list-inline mb-4" id="portfolio-flters">
                    @foreach ($album as $albumItem) 
                    <a href="/album/{{ $albumItem->AlbumID }}/detail"><li class="btn btn-primary btn-oval m-1 album" data-album-id="/category/{{$albumItem->AlbumID}}">
                        <h4>{{$albumItem->NamaAlbum}}</h4>
                    </li></a>
                        
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- <a href="{{ route('album.photos', ['id' => $album->AlbumID]) }}" class="text-white text-decoration-none">{{ $album->NamaAlbum }}</a> --}}
</div>
        {{-- <img src="{{asset('storage/images/photo-images/'.$photo->LokasiFile)}}"  style="height: 700px; width: 700px" class="card-img-top" alt="..."> --}}
        </div>
    </div>
</div>



    
    
    

@endsection