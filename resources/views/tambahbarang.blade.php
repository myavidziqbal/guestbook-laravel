@extends('layout.admin')

@section('content')
<body>
<br>
  
  <h1 class="text-center mb-5 mt-5">Tambah Data Barang Dan Surat</h1>

  <div class="container mb-5">
      <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/insertbarang" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No Surat</label>
                    <input type="text" name="nosurat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('nosurat')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pengirim</label>
                    <input type="text" name="pengirim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('nama')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Penerima</label>
                    <select class="form-select" name="penerima" aria-label="Default select example">
                      <option selected>Pilih Penerima</option>
                      <option value="Omad">Omad</option>
                      <option value="Mutamad">Mutamad</option>
                      <option value="Suyanto">Suyanto</option>
                      <option value="Badru">Badru</option>
                    </select>  
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tujuan</label>
                    <input type="text" name="tujuan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('nama')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
                
                  
                </form>
              </div>
            </div>
          </div>
        </div>             
      
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  -->
</body>  


@endsection