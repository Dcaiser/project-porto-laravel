<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            padding: 30px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .btn-submit {
            background: #6a11cb;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #2575fc;
        }

        .success-message {
            background: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Data Sertifikat</h1>

        <form action="{{route('admsertif.update', $ser)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">judul</label>
                <input type="text" name="nama" required value="{{$ser->name}}">
            </div>

            <div class="form-group">
                <label for="nama">diberikan oleh</label>
                <input type="text" name="issuedb" required value="{{$ser->issued_by}}">
            </div>
            <div class="form-group">
                <label for="nama">diberikan pada</label>
                <input type="date" name="issueda" required value="{{$ser->issued_at}}">
            </div>

            <div class="form-group">
                <label for="gambar">pilih file</label>
                <input type="file" name="fileg"  accept="png">
                <small>file terkini: <a href="{{asset('storage/'.$ser->file)}}" target="_blank">lihat</a></small>        

            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="desk" >{{$ser->desc}}</textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
        </form>
    </div>
</body>
</html>
