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
  <div class="row">
    <div class="col-6">
            <h3>&nbsp;&nbsp;Edit Data Siswa</h3>
        </div>
    <div class="col-lg-12">
        <div class="modal-body">
        <form action="/admin/{{$siswa->id}}/edit" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
                <label for="inputnis">NIS</label>
                <input name="nis" type="text" class="form-control" id="inputnis" aria-describedby="nishelp" value="{{ old('siswa', @$siswa->nis) }}">
                <small id="nishelp" class="form-text text-muted">Pastikan nis sesuai dengan yang ada di kartu pelajar.</small>
              </div>

              <div class="form-group">
                <label for="inputnama">Nama Lengkap</label>
                <input name="nama" type="text" class="form-control" id="inputnama" value="{{ old('siswa', @$siswa->nama) }}">
              </div>

              <div class="form-group">
                <label for="input">Jenis Kelamin</label>
                <div class="form-check">
                <input name="jk" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Laki - Laki"
                {{ old('siswa', @$siswa->jk) == 'Laki - Laki' ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleRadios1">
                  Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
                <input name="jk" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Perempuan"
                {{ old('siswa', @$siswa->jk) == 'Perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleRadios2">
                  Perempuan
                </label>
              </div>
              </div>

              <div class="form-group">
                <label for="inputkelas">Kelas</label>
                <select name="kelas" id="inputkelas" class="form-control">
                    <option value="{{ old('siswa', @$siswa->kelas) }}" selected>Choose...</option>
                    <option value="XII RPL 1" {{ old('siswa', @$siswa->kelas) == 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1</option>
                    <option value="XII RPL 2" {{ old('siswa', @$siswa->kelas) == 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2</option>
                    <option value="XII RPL 3" {{ old('siswa', @$siswa->kelas) == 'XII RPL 3' ? 'selected' : '' }}>XII RPL 3</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="inputnohp">Nomor Handphone</label>
                <input name="nohp" type="text" class="form-control" id="inputnohp" value="{{ old('siswa', @$siswa->nohp) }}">
              </div>

              <div class="form-group">
                <label for="inputalamat">Alamat Rumah</label>
                <textarea name="alamat" class="form-control" id="inputalamat">{{ old('siswa', @$siswa->alamat) }}</textarea>
              </div>

            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin akan mengedit data ?');">Update Data</button>
          </form>
        </div> 
      </div> 
    </div> 
  </div>
</div>

@endsection     