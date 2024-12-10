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
        <h1>Tambah Data</h1>

        <form action="{{route('admsertif.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">judul</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="nama">diberikan oleh</label>
                <input type="text" name="issuedby" required>
            </div>
            <div class="form-group">
                <label for="nama">diberikan pada</label>
                <input type="date" name="issuedat" required>
            </div>

            <div class="form-group">
                <label for="gambar">pilih file</label>
                <input type="file" name="file" required accept="png">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="desc" ></textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
        </form>
    </div>
</body>
</html>
