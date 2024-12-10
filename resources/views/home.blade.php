<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <title>PORTY|M. Dzikri Alfajri</title>
</head>
<body>
    <nav>
        <div class="in_nav">
            <div class="nav1">
                <a href="#about">about</a>
                <a href="#skill">Skill</a>
                <a href="#project">Certificate</a>
            </div>
        </div>
    </nav>
    <header id="header">
        <div class="in_header">
            <div class="head1">
                <div class="in_head1">
                @foreach($about as $ab)

                    <h1 style="font-family: nexa;">Hello, i'm</h1>
                    <h1 style="font-size: 50px; font-family: modern; margin: 0;">{{$ab->nama}}</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis tenetur maiores quibusdam exercitationem quo culpa labore nihil voluptates, placeat suscipit unde assumenda consequuntur nostrum molestias porro accusamus cumque corrupti vitae.</p>
                    <button>contact me</button>
                    @endforeach

                </div>
            </div>
            <div class="head2">
                <img src="{{asset('aset/akukece.jpg')}}" width="400px" style="border-radius: 50px;" id="aku">
            </div>
        </div>
    </header>
    <section>
        <div class="in_section" id="about">
            <div class="sec1">
                <img src="{{asset('aset/akununjuk-removebg-preview.png')}}">
            </div>
            <div class="sec2">
                <h1 style="font-size: 45px; font-family: modern;">ABOUT ME</h1>
                @foreach($about as $ab)
                <P>Hai, Namaku {{$ab->nama}}, aku adalah seorang pelajar. aku sangat suka sekali dengan {{$ab->hobi}}. oh ya btw aku lahir pada {{$ab->ttl}}. aku menjalani hidup dengan prinsip {{$ab->motto}}</P>
                @endforeach
            </div>
        </div>
    </section>
    <div class="anm" id="anm_"><?xml version="1.0" ?>
        <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="30px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="396.6,160 416,180.7 256,352 96,180.7 115.3,160 256,310.5 "/></svg>
    </div>
    
    <div class="service" id="skill">
        <div class="in_serv">
            <div class="servh">
                <h1 style="font-family: modern;">SKILLS</h1>
            </div>
            <div class="servb">
                    @foreach($skill as $sk)
<div class="card">
  <div class="img"><img src="{{asset('storage/'.$sk->gambar)}}" alt=""></div>
  <span>{{$sk->nama}}</span>
  <p class="info">{{$sk->desk}}</p>
  <button>Resume</button>
</div>
@endforeach
            </div>
        </div>
    </div>
    <div class="project" id="project">
        <div class="in_project">
            <div class="pro1">
                <h1 style="font-family:modern;">my certificate</h1>
            </div>
            <div class="pro2">
                @foreach ($sertif as $s)
                <div class="card2">
  <a class="card-image-container" href="{{asset('storage/'.$s->file)}}" target="_blank" style="background:url('{{asset('storage/'.$s->file)}}'); background-size:cover;">
  </a>
  <p class="card-title">{{$s->name}}</p>
  <p class="card-des">
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam inventore
    natus modi repellendus dolorem unde odio sequi! Porro, cum maiores tempore
    suscipit laudantium perspiciatis, illo sunt, reprehenderit quae est
    blanditiis.
  </p>
</div>
@endforeach
            </div>
        </div>
    </div>
    <footer>
        <div class="infooter">
            <div class="foot1">
                <h1 style="font-family:modern; color: #fff;">contact me</h1>
                
            </div>
            <div class="foot2">

            </div>
        </div>
    </footer>
</html>