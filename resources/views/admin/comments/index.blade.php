@extends('admin.layouts.main')
    
@section('container')

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">

            <div class="card">
                <div class="card-header">
                  <h4>Komentar</h4>
                </div>
                <div class="card-body">
          @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
          @endif
                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Foto</th>
                            <th scope="col">Komentar</th>
                            <th scope="col">Nama</th>
                          </tr>
                    </tr>
                  </thead>
                  <tbody>
        @foreach ($comments as $comments)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $comments->JudulFoto }}</td>
            <td>{{ $comments->IsiKomentar }}</td>
            <td>{{ $comments->cmn_name }}</td>
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