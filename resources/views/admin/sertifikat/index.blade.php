<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            margin: 0;
            padding: 10px 0;
            font-size: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-links {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
            padding: 10px 15px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            transition: background 0.3s, transform 0.3s;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            background: #f4f4f9;
            padding: 30px;
            overflow-y: auto;
        }

        .main-content h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .table th {
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .table input[type="text"],
        .table textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 5px;
        }

        .table textarea {
            resize: none;
            height: 60px;
        }

        /* File Input Styling */
        .custom-file {
            position: relative;
            display: inline-block;
            width: 90%;
        }

        .custom-file input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .custom-file-label {
            display: inline-block;
            padding: 10px;
            width: 100%;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
            color: #333;
            text-align: left;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .custom-file input[type="file"]:hover + .custom-file-label {
            background: #f0f0f0;
            border-color: #aaa;
        }

        /* Button Styling */
        .submit-btn {
            background: rgb(255,27,85);
            background: linear-gradient(99deg, rgba(255,27,85,1) 0%, rgba(185,5,45,1) 82%);            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }

        .submit-btn:hover {
            background: red;
        }
        .submit-btn1 {
            background: rgb(27,139,255);
            background: linear-gradient(99deg, rgba(27,139,255,1) 0%, rgba(5,5,185,1) 82%);            padding: 12px 25px;
            border: none;
            color:#fff;
            text-decoration:none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            transition: background 0.3s;
            float:left;
        }

        .submit-btn1:hover {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }
        .submit-btn2 {
            background: rgb(240,236,5);
            background: linear-gradient(99deg, rgba(240,236,5,1) 0%, rgba(148,154,2,1) 82%);
            text-decoration:none;
            font-size:20px;
            color:#fff;
            padding:5px;
            border-radius:5px;
        }

        .submit-btn2:hover {
            background: rgb(163,161,5);
            background: linear-gradient(99deg, rgba(163,161,5,1) 0%, rgba(209,217,8,1) 82%);        }

    </style>    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="nav-links">
            <a href="adm">Profil</a>
            <a href="admskill">Skill</a>
            <a href="admsertif" style="color:#000;">Sertifikat</a>
            <a href="{{route('pro.index')}}">Project</a>
        </div>
    </div>
    <div class="main-content">
        <h1>sertifikat saya</h1>
        <a href="{{route('admsertif.create')}}" class="submit-btn1">tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>nama</th>
                    <th>diberikan oleh:</th>
                    <th>diberikan pada:</th>
                    <th>file</th>
                    <th>deskripsi</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sertif as $ser)
                <tr>
                    <td><h3>{{$ser->name}}</h3></td>
                    <td><h3>{{$ser->issued_by}}</h3></td>
                    <td><h3>{{$ser->issued_at}}</h3></td>
                    <td><img src="{{asset('storage/'.$ser->file)}}"  width="80px"></td>
                    <td><p>{{$ser->desc}}</p></td>
                    <td style="display:flex; align-items:center; justify-content:space-evenly;">
                        <a href="{{route('admsertif.edit', $ser->id)}}" class="submit-btn2">Edit</a>
                        <form class="delete-form" action="{{route('admsertif.destroy', $ser->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="submit-btn delete-btn">hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Tampilkan SweetAlert2 jika ada pesan sukses
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        // Konfirmasi Hapus
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah form langsung submit

                // Dapatkan form terkait
                const form = this.closest('.delete-form');

                // Tampilkan dialog konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit form jika pengguna mengonfirmasi
                        form.submit();
                    }
                });
            });
        });
    </script>
    </body>
</html>
