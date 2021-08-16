<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #aa0404;
  color: white;
}
</style>
</head>
<body>

<h3>Koyota International Group</h3>
<h1>Data Tamu</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
  </tr>
@php
   $no=1;
@endphp
@foreach ($data as $row)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$row->nama}}</td>
    <td>{{$row->jenis_kel}}</td>
    <td>{{$row->telepon}}</td>
  </tr>
@endforeach
  
    
</table>

</body>
</html>
