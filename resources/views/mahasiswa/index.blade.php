<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Data Mahasiswa</title>
</head>
<body>
<nav>
    <ul class="menu">
        <li><a href="{{ url('mahasiswa') }}">Beranda</a></li>
        <li><a href="{{ url('mahasiswa/create') }}">Form Biodata</a></li>
    </ul>
</nav>

<div class="wrapper">
      <div class="container">
        <!----Picture and name---->
        <div class="picture">
        <img src="{{ asset('assets/profilphoto1.jpeg') }}" alt="ayu ista's photo" />
        </div>
        <div class="name" translate="no">Ayu Istawati Jayanti</div>

        <!--more details button-->
        <div class="info-box">
          About me
          <div class="toggle" onclick="vibrate()">
            <i class="fa-solid fa-chevron-down"></i>
          </div>
          <!--details-->
          <div>
            <br/>
            <div class="details">
              <ul>
              <li class="about">
                Halo, Saya Ayu Istawati Jayanti, seorang mahasiswa jurusan teknologi informasi fakultas Teknik Universitas Udayana
               Saya Memiliki keingintahuan di bidang IT, dan ingin terus mempelajarinya.
                <br><br> Berikut detail biodata saya tampilkan: 
              </li>

    @if(session('success'))
        <div style="color: black;">{{ session('success') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->id }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>

    <!----All social media buttons---->
   <div class="social-media">
    <a href="https://wa.me/+6282340571151">
        <div><i class="fab fa-whatsapp"></i>WA</div>
    </a>
    <a href="https://instagram.com/ayuistawatii?igshid=MzNlNGNkZWQ4Mg==">
        <div><i class="fa-brands fa-instagram"></i>Instagram</div>
    </a>
</div>
<script src="{{ asset('assets/script.js') }}"></script>
</body>
</html>
