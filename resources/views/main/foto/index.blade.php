@extends('main.layouts.main')
  
@section('container')
<style>
    .fas.fa-heart {
        color: white; /* Warna putih */
    }

    /* Warna ikon hati saat disukai */
    .fas.fa-heart.liked {
        color: red; /* Warna merah */
    }
</style>
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Photos
        </h2>
    </div>

    <div class="row pb-3">
        <!-- Di dalam loop foreach -->
        @foreach ($photos as $photo)
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
                <img class="card-img-top mb-2" src="{{asset('storage/photo-images/'.$photo->LokasiFile)}}" alt="" style="width: 100%;" />
                <div class="card-body bg-light text-center p-4">
                    <h4>{{$photo->JudulFoto}}</h4>
                    <div class="d-flex justify-content-center mb-3">
                        <!-- Ikon hati untuk like -->
                        <small id="like-icon-{{ $photo->FotoID }}" class="mr-3 like-icon" data-photo-id="{{ $photo->FotoID }}">
                            <i class="fas fa-heart"></i> <!-- Perbarui kelas ikon hati -->
                        </small>
                        <!-- Sisa informasi -->
                        <small class="mr-3"><i class="fa-regular fa-user"></i> {{ $photo->user->username }}</small>
                        <small class="mr-3"><i class="fa-regular fa-folder"></i> {{ $photo->NamaAlbum }}</small>
                    <small class="mr-3"><i class="fa-regular fa-comment"></i> {{$photo->comments_count}}</small> <!-- Tampilkan jumlah komentar -->
                    </div>
                    <a href="/foto/{{ $photo->FotoID }}/detail" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        // Di dalam script yang Anda punya
        // Event listener untuk setiap ikon hati yang belum dilike
        const likeIcons = document.querySelectorAll('.like-icon');
        likeIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const FotoID = this.getAttribute('data-photo-id');
                const likeIcon = document.getElementById(`like-icon-${FotoID}`);

                // Mengambil status like saat ini dari class ikon hati
                const isLiked = likeIcon.classList.contains('liked');

                // Mengatur metode berdasarkan status like saat ini
                const method = isLiked ? 'DELETE' : 'POST';

                fetch(`/photos/${FotoID}/${isLiked ? 'unlike' : 'like'}`, { // Menggunakan 'unlike' jika sudah dilike, 'like' jika belum dilike
                    method: method, // Menggunakan DELETE untuk unlike, POST untuk like
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ photo_id: FotoID })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeCount = data.likes;
                        likeIcon.innerHTML = `<i class="fas fa-heart"></i> ${likeCount}`; // Perbarui kelas ikon hati

                        // Mengubah status like pada class ikon hati
                        likeIcon.classList.toggle('liked');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</div>
@endsection