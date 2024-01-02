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
    <title>Form Biodata Mahasiswa</title>
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
    <div class="info-box">
          Edit Biodata
          <div class="toggle" onclick="vibrate()">
            <i class="fa-solid fa-chevron-down"></i>
          </div>
          <!--details-->
          <div>
            <br/>
            <div class="details">
              <ul>
              <li class="about">

              @if ($errors->any())
        <div style="color: red;">
            <strong>Whoops!</strong> Ada masalah dengan inputanmu.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ $mahasiswa->nama }}" required><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}" required><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
</li>
</div>
<style>
    form {
        max-width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    button {
        background-color: black;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: black;
    }

    .error-message {
        color: red;
        font-weight: bold;
    }
</style>

<script src="{{ asset('assets/script.js') }}"></script>

</body>
</html>
