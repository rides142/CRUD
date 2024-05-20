@extends('layouts.app')

@section('content')
    <div>
        <table style="text-align:left; border:1px solid;border-collapse;">
            <tr>
                <th style="border:1px solid; padding:10px; text-align:center">No</th>
                <th style="border:1px solid; padding:10px; text-align:center">Nama</th>
                <th style="border:1px solid; padding:10px; text-align:center">NIM</th>
                <th style="border:1px solid; padding:10px; text-align:center">PRODI</th>
                <th style="border:1px solid; padding:10px; text-align:center">Hobby</th>
                <th style="border:1px solid; padding:10px; text-align:center">Alamat</th>
                <th style="border:1px solid; padding:10px; text-align:center">Foto</th>
                <th style="border:1px solid; padding:10px; text-align:center">Opsi</th>
            </tr>
            @foreach ($mahasiswa as $mahasiswa)
                <tr>
                    <td style="border:1px solid; padding:10px;">{{ $loop->iteration}}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mahasiswa->nama}}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mahasiswa->nim}}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mahasiswa->prodi}}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mahasiswa->hobby}}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mahasiswa->alamat}}</td>
                    <td style="border:1px solid; padding:10px;"><img src="{{asset('fotomhs/' .$mahasiswa->foto)}}" alt="fotomhs" style="width: 60px"></td>
                    <td style="border:1px solid; padding:10px;">
                        <button>
                            <a  href="/update-mahasiswa/{{$mahasiswa->nim}}">Detail</a>
                        </button>
                        <button>
                            <a  href="/update-mahasiswa/{{$mahasiswa->nim}}">Edit</a>
                        </button>
                        <button>
                            <a  href="/delete-mahasiswa/{{$mahasiswa->nim}}">Hapus</a>
                        </button>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection
