@extends('layouts.app')
@section('content')
@if (empty($mahasiswa))
    <h2>Input Data Diri</h2>
    <div>
        <form action="/add-mahasiswa" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Masukan Nama Anda :</label>
            <input type="text" id="nama" name="nama" placeholder="Masukin Namamu well"><br><br>
            <label for="nim">Masukan NIM Anda :</label>
            <input type="text" id="nim" name="nim" placeholder="Masukin NIMnya kaka"><br><br>
            <label for="prodi">Masukan Program Studi Anda : </label>
            <input type="text" id="prodi" name="prodi" placeholder="sembarang well"><br><br>
            <label for="hobby">Masukan Hobby Anda : </label>
            <input type="text" id="hobby" name="hobby" placeholder="ndk tau"><br><br>
            <label for="alamat">Masukan Alamat Anda : </label>
            <input type="text" id="alamat" name="alamat" placeholder="dimana tuch"><br><br>
            <label for="alamat">Masukan Foto Anda : </label>
            <input type="file" id="foto" name="foto"><br><br>
            <button type="submit">klik king</button>
        </form>
    </div>
@else
    <h2>Update Data Diri</h2>
    <div>
        <form action="/edit-mhs/{{$mahasiswa->nim}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Perbarui Nama Anda :</label>
            <input type="text" id="nama" name="nama" placeholder="Masukin Namamu Kak" value="{{$mahasiswa->nama}}"><br><br>
            <label for="nim">Perbarui NIM Anda :</label>
            <input type="text" id="nim" name="nim" placeholder="Masukin NIM kaka" value="{{$mahasiswa->nim}}"><br><br>
            <label for="prodi">Perbarui Program Studi Anda : </label>
            <input type="text" id="prodi" name="prodi" placeholder="HMPSTI JOSS" value="{{$mahasiswa->prodi}}"><br><br>
            <label for="hobby">Perbarui Hobby Anda : </label>
            <input type="text" id="hobby" name="hobby" placeholder="5 jari" value="{{$mahasiswa->hobby}}"><br><br>
            <label for="alamat">Perbarui Alamat Anda : </label>
            <input type="text" id="alamat" name="alamat" placeholder="alam baka" value="{{$mahasiswa->alamat}}"><br><br>
            <label for="foto">Perbarui Foto Anda : </label>
            <input type="file" id="foto" name="foto" value="{{$mahasiswa->foto}}"><br><br>
            <button type="submit">Update dong </button>
        </form>
    </div>
@endif
@endsection
