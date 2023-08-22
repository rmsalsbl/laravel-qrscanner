<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRSCAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
  </head>
  <body>

    <div class="container col-lg-4 py-5">
        {{-- scanner --}}
        <div class="card bg-white shadow rounded-3 p-3 border-0">
            {{-- Pesan --}}

            @if (session()->has('gagal'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('gagal') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="scanner"></div>
            <video id="preview"></video>

            {{-- Form --}}
            <form action="{{ route('store') }}" method="POST" id="form">
                @csrf
            <input type="hidden" name="id_siswa" id="id_siswa">
            </form>
        </div>
        {{-- Scanner --}}

        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    @foreach ($absen as $item)
                        <tr>
                           <td>{{ $item->siswa->nama }}</td>  
                           <td>{{ $item->tanggal }}</td> 
                        </tr>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
          console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });

        scanner.addListener('scan', function(c){
            document.getElementById('id_siswa').value = c;
            document.getElementById('form').submit();

        })
    //     let scanner = new Instascan.Camera({ video: document.getElementById('preview') });
    //     scanner.addListener('scan', function (content) {
    //       console.log(content);
    //     });
    //     Instascan.Camera().then(function (cameras) {
    //       if (cameras.length > 0) {
    //         scanner.start(cameras[0]);
    //       } else {
    //         console.error('No cameras found.');
    //       }
    //     }).catch(function (e) {
    //       console.error(e);
    //     });

    //     scanner.addListener('scan', function(c){
    //         document.getElementById('id_siswa').value = c;
    //         document.getElementById('form').submit();

    //     })
    //   </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>