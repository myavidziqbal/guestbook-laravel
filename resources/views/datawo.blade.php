@extends('layout.admin')
@push('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">WORK ORDER</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid">
    <a href="/tambahwo" class="btn btn-primary">Tambah+</a>
    
  
      <div class="row g-3 align-items-center mt-2 mb-2">
        
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
  
    
  <div class="container-fluid">
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 1%">#</th>
            <th style="width: 1%">Tanggal</th>
            <th style="width: 5%">Peminta WO</th>
            <th style="width: 1%">Prioritas</th>
            <th style="width: 2%">Penerima WO</th>
            <th style="width: 3%">Departemen</th>
            <th style="width: 10%">Deskripsi Masalah</th>
            <th style="width: 2%">Tindakan</th>
            <th style="width: 1%">status</th>
            <th style="width: 6%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($data as $index => $row)
          <tr>
          <th scope="row">{{$no++}}</th>
              <td>{{$row->created_at->format('d-m-Y')}}</td>
              <td> {{ $row->name_req}}</td>
              <td> {{ $row->priority}}</td>
              <td> {{ $row->name_receipt}}</td>
              <td> {{ $row->dept}}</td>
              <td> {{ $row->issue}}</td>
              <td> {{ $row->action}}</td>
              <td> <span class="badge {{ ($row->status == 1) ? 'badge-danger' : 'badge-success' }}">{{( $row->status == 1) ? 'Open' : 'Close' }}</span> </td>
              
              <td>
                  <a href="/tampilwo/{{$row->id}}" class="btn btn-warning"><i class="fas  fa-check-square"></i></a>
                  <!-- <i class="fas fa-sign-out-alt"></i> -->
                  <!-- <a href="#" class="btn btn-danger finish" data-id="{{$row->id}}" data-nama="{{$row->name_req}}">Selesai</a> -->
                  <form action="/selesaiwo/{{$row->id}}" method="POST">
                  @csrf
                    <!-- <button class="btn btn-success"><i class="fas fa-flag-checkered"></i></button> -->
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Work Order Sudah Selesai!');">
                    <i class="fas fa-flag-checkered"></i>
                    </button>
                  </form>
                  
                </td>
            </tr>
          @endforeach
            
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection

@push('scripts')
    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

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
// $('.finish').click(function(){
//   var woid = $(this).attr('data-id');
//   var nama = $(this).attr('data-nama');
//   document.querySelector(".first").addEventListener("click", function() {
//   swal({
//     title: "Show Two Buttons Inside the Alert",
//     showCancelButton: true,
//     confirmButtonText: "Confirm",
//     confirmButtonColor: "#00ff99",
//     cancelButtonColor: "#ff0099"
//   });
// });
//   swal({
//         title: "Yakin ?",
//         text: "Kamu akan update data dengan nama "+nama+" ",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//       })
//       .then((isConfirmed) => {
//         if (isConfirmed) {
//           window.location = "/selesaiwo/"+tamuid+" "
//           swal("Data berhasil di Update!", {
//             icon: "success",
//           });
//         } else {
//           swal("Data tidak jadi di update");
//         }
//   });
// });
        

</script>

<script>
@if (Session::has('success'))
  toastr.success("{{ Session::get('success') }}");
@endif
</script>
@endpush