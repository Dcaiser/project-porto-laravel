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
        }

        .main-content p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }

        /* Table Styling */
        .table {
            width: 100%;
            padding:20px;
            border-collapse: collapse;
            margin: 20px 0;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead tr {
            background: #6a11cb;
            color: #fff;
            text-align: left;
            font-weight: bold;
        }

        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        .table input[type="text"],
        .table textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 5px;
        }

        .table textarea {
            resize: none;
            height: 60px;
        }

        .table tbody tr:hover {
            background: #f9f9f9;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Button Styling */
        .submit-btn {
            background: #6a11cb;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #2575fc;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="nav-links">
            <a href="/adm" style="color:#000;">profil</a>
            <a href="admskill">Skill</a>
            <a href="admsertif">Sertifikat</a>
            <a href="{{route('pro.index')}}">Project</a>
        </div>
    </div>
    <div class="main-content">
        <h1>Profil Saya</h1>
        @foreach ($about as $ab)

        <form action="{{route('adm.update', $ab)}}" method="post">
            @csrf
            @method('PUT')
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" required value="{{$ab->nama}}">
                        </td>
                        <td>
                            <label for="ttl">Tempat, Tanggal Lahir</label>
                            <input type="text" name="ttl" required value="{{$ab->ttl}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="hobi">Hobi</label>
                            <input type="text" name="hobi" required value="{{$ab->hobi}}">
                        </td>
                        <td>
                            <label for="motto">Motto</label>
                            <textarea name="motto" required >{{$ab->motto}}</textarea>
                        </td>
                    </tr>
                </thead>
                @endforeach
            </table>
            <button type="submit" class="submit-btn">Simpan</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    @if(session('success'))
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });       
 @endif
</script>

</html>
