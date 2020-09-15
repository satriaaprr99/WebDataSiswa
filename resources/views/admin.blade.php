@extends('layouts.app')

@section('content')
<div class="container">
	@if(session('sukses'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
  		{{session('sukses')}}
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
	</div>
	@endif
    <div class="row justify-content-center">
        <div class="col-6">
            <h1>Data Siswa</h1>
        </div>
        <div class="col-6">
        	<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
 				<i class="fa fa-plus-square"></i> Tambah Data
			</button>
			<a style="margin-left: 370px;" href="/admin" class="btn btn-warning"><i class="fa fa-refresh"></i></a>
        </div>
        <table class="table table-hover">
        	<center>
        	<thead>
        	<tr>
        		<th>No</th>
        		<th>NIS</th>
        		<th>Nama Lengkap</th>
        		<th>JeKel</th>
        		<th>Kelas</th>
        		<th>NomorHp</th>
        		<th>Alamat</th>
        		<th>Aksi</th>
        	</tr>
        	</thead>
        	</center>
        	<?php $no = 1; ?>
        	@foreach($siswa as $siswa)
        	<tr>
        		<td>{{ $no++ }}</td>
        		<td>{{ $siswa->nis }}</td>
        		<td>{{ $siswa->nama }}</td>
        		<td>{{ $siswa->jk }}</td>
        		<td>{{ $siswa->kelas }}</td>
        		<td>{{ $siswa->nohp }}</td>
        		<td>{{ $siswa->alamat }}</td>
        		<td>
        			<a href="/admin/{{ $siswa->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
        			<a href="/admin/{{ $siswa->id }}/hapus" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></a>
        		</td>
        	</tr>
        	@endforeach
        </table>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <form action="/admin/tambah" method="POST">
	  	@csrf

		  <div class="form-group">
		    <label for="inputnis">NIS</label>
		    <input name="nis" type="text" class="form-control" id="inputnis" aria-describedby="nishelp">
		    <small id="nishelp" class="form-text text-muted">Pastikan nis sesuai dengan yang ada di kartu pelajar.</small>
		  </div>

		  <div class="form-group">
		    <label for="inputnama">Nama Lengkap</label>
		    <input name="nama" type="text" class="form-control" id="inputnama">
		  </div>

		  <div class="form-group">
		    <label for="input">Jenis Kelamin</label>
		    <div class="form-check">
			  <input name="jk" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Laki - Laki">
			  <label class="form-check-label" for="exampleRadios1">
			    Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  </label>
			  <input name="jk" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Perempuan">
			  <label class="form-check-label" for="exampleRadios2">
			    Perempuan
			  </label>
			</div>
		  </div>

		  <div class="form-group">
		    <label for="inputkelas">Kelas</label>
		    <select name="kelas" id="inputkelas" class="form-control">
	        	<option value="" selected>Choose...</option>
	        	<option value="XII RPL 1">XII RPL 1</option>
	        	<option value="XII RPL 2">XII RPL 2</option>
	        	<option value="XII RPL 3">XII RPL 3</option>
	      	</select>
		  </div>

		  <div class="form-group">
		    <label for="inputnohp">Nomor Handphone</label>
		    <input name="nohp" type="text" class="form-control" id="inputnohp">
		  </div>

		  <div class="form-group">
		    <label for="inputalamat">Alamat Rumah</label>
		    <textarea name="alamat" class="form-control" id="inputalamat"></textarea>
		  </div>
		  
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Data</button>
		   </form>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection
