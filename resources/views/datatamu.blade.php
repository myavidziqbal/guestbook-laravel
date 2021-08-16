<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Guest Book - KIG</title>
  </head>
  <body>

    <nav class="navbar navbar-dark bg-danger">
        <div class="container-fluid">
          <a class="navbar-brand" href="/tamu">KOYOTA INTERNATIONAL GROUP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <h1 class="text-center mb-4 mt-5">Data Tamu</h1>

    <div class="container">
        <a href="/tambahtamu" class="btn btn-primary">Tambah+</a>
        

          <div class="row g-3 align-items-center mt-2">
            
            <div class="col-auto">
              <form action="/tamu" method="GET">
                <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Cari Data">
              </form>
            </div>
            <div class="col-auto">
              <a href="/exportpdf" class="btn btn-info">Export PDF</a>
            </div>
            <div class="col-auto">
              <a href="/exportexcel" class="btn btn-success">Export Excel</a>
            </div>
            <div class="col-auto">
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Import Data
            </button>
            </div>    
                    
          </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/importexcel" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="file" name="file" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
              </div>
            </div>

        <div class="row">
          {{-- @if ($message = Session::get('success'))
              <div class="alert alert-success" role="alert">
                {{ $message }}
              </div>
          @endif --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
              

              @php
                  $no = 1;
              @endphp
              @foreach ($data as $index => $row)
              <tr>
                <th scope="row">{{$index + $data->firstItem() }}</th>
                <td>{{$row->nama}}</td>
                <td>
                  <img src="{{asset('fototamu/'.$row->foto)}}" alt="" style="width: 40px">
                </td>
                <td>{{$row->jenis_kel}}</td>
                <td>{{$row->telepon}}</td>
                <td>{{$row->created_at->format('d-m-Y')}}</td>
                <td>
                  <a href="/tampildata/{{$row->id}}" class="btn btn-warning">Edit</a>
                  {{-- <a href="/delete/{{$row->id}}" type="button" class="btn btn-danger">Hapus</a> --}}
                  <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}">Hapus</a>
      
                </td>              
              </tr>
              @endforeach
            </tbody>
            
          </table>
          {{ $data->links() }}
      </div>
            
          
    </div>

        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
      var tamuid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
            title: "Yakin ?",
            text: "Kamu akan hapus data dengan nama "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location = "/delete/"+tamuid+" "
              swal("Data berhasil di hapus!", {
                icon: "success",
              });
            } else {
              swal("Data tidak jadi dihapus");
            }
      });
    });
            

  </script>

  <script>
    @if (Session::has('success'))
      toastr.success("{{ Session::get('success') }}");
    @endif
  </script>
</html>