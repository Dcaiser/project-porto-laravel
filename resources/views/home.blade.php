<!doctype html>
<html class="scroll-smooth">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M. Dzikri Alfajri</title>
    <link rel="icon" href="{{ asset('storage/Dzik_logo.png') }}" type="image/png">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
  </head>
  <body class="bg-[#000] text-white  m-0">
      <nav id="navbar" class="flex w-full h-20 ">
        <div class="fixed z-50 flex w-full bg-black/30">
            <div class="flex items-center justify-center w-1/4 h-full p-2">
                <h1><a class="sm:text-sm md:text-3xl text-[#fff] font-bold" href="#header" >MY<span class="text-[#F5DD62]">PORTO</span></a></h1>
            </div>
            <div class="flex items-center w-3/4 gap-4 capitalize justify-evenly sm:text-sm md:text-lg">
                <a href="#about" class="relative inline-block w-32 text-center">
                    <span class="after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#F5DD62] after:transition-all after:duration-300 after:-translate-x-1/2 hover:after:w-full">
                    about
                    </span>
                </a>
                <a href="#ex" class="relative inline-block w-32 text-center">
                    <span class="after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#F5DD62] after:transition-all after:duration-300 after:-translate-x-1/2 hover:after:w-full">
                        experience
                    </span>
                </a>
                <a href="#skill" class="relative inline-block w-32 text-center">
                    <span class="after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#F5DD62] after:transition-all after:duration-300 after:-translate-x-1/2 hover:after:w-full">
                        skill
                    </span>
                </a>
                <a href="#gallery" class="relative inline-block w-32 text-center">
                    <span class="after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#F5DD62] after:transition-all after:duration-300 after:-translate-x-1/2 hover:after:w-full">
                        gallery
                    </span>
                </a>

                <a href="#cont" class="relative inline-block w-32 text-center">
                    <span class="after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#F5DD62] after:transition-all after:duration-300 after:-translate-x-1/2 hover:after:w-full">
                    contact
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="p-1 text-center transition border border-gray-500 lg:visible sm:invisible w-28 hover:bg-white hover:text-black rounded-3px">
                    log in
                </a>
            </div>

        </div>
      </nav>
      <header class="w-full h-screen flex gap-0.5" id="header">
        <div class="flex flex-col justify-center w-1/2 h-full p-4">
            <p class="text-[#F5DD62] text-2xl ">HALLO</p>
            <h2 class="text-7xl ">my name is <span class="text-[#F5DD62] font-bold">Muhamad Dzikri Alfajri</span></h2>
            <div class="flex gap-4 p-4">
                <a href="#cont" class="w-30 text-center p-2 border-2 border-[#F5DD62] transition-all rounded-[20px] hover:bg-[#F5DD62] hover:text-black ">hubungi saya</a>
                <a href="{{ asset('storage/doc/CV_dzikri.pdf') }}" download class="w-30 text-center p-2 border-2 border-[#fff] rounded-[20px] hover:bg-[#fff] hover:text-black transition-colors">unduh cv</a>
            </div>
        </div>
        <div class="flex-col items-center justify-center w-1/2 h-full md:flex">
            <img src="storage/aku-jas-hd.png" alt="" class="z-10 md:h-full grayscale-50 md:visible sm:invisible">
            <div class="h-1 w-56 bg-[#F5DD62] mt-3 mx-auto rounded-full"></div>
      </header>
      <section class="w-full ">
        <div class="w-full md:flex  items-center min-h-screen bg-[#171717] " id="about">
            @foreach ($about as $ab)

            <div class="items-center justify-center p-4 md:w-1/2 sm:w-full md:flex sm:hidden">
                <img src="{{ asset('storage/' . $ab->poto) }}" alt="Foto" class="p-4  w-1/2 grayscale-[70%] transition hover:grayscale-0 ">
            </div>

            <div class="flex flex-col gap-4 p-4 md:w-1/2 sm:w-full">
                <h1 class="text-3xl font-bold">About me</h1>
                <h3 class="sm:text-sm md:text-lg">
                    {{ $ab->descript }}
                </h3>
                <div class="flex flex-col ">
                    <h1 class="font-bold uppercase">Education</h1>
                    <ul class="list-disc">
                        <li class="bullet">SDN Ciomas 05 (2014-2020)</li>
                        <li class="">SMPN 1 Ciomas (2020-2023)</li>
                        <li class="">SMKN 1 Ciomas (now)</li>
                    </ul>
                </div>
              </div>
            @endforeach

        </div>
        <div class="items-center justify-center p-4 h-fit" >
            <div class="m-4">
                <h1 class="text-3xl font-bold text-center capitalize" id="ex">experience & soft skill</h1>
                <p class="text-center text-gray-400">this is my experience & soft skill that i got while I was in school</p>
            </div>
            <div class="justify-center gap-12 md:flex" >

            @if ($exper->isnotEmpty())
            @foreach ($exper as $exp)

                <div class="max-w-sm h-100 rounded overflow-hidden border-l-4 border-[#F5DD62] shadow-lg bg-[#222222] cursor-pointer"  x-data="{ open: false }" @click="open = true">
                    <img class="w-full grayscale-[70%] hover:grayscale-0 transition " src="{{ asset('storage/' . $exp->foto) }}" alt="me">
                    <div class="px-6 py-4">
                        <div class="mb-2 text-xl font-bold">{{ $exp->judul }}</div>
                        <p class="text-[#fff] text-base">
                            {{ $exp->deskripsi }}
                        </p>
                    </div>
                    <div x-show="open" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black bg-opacity-50" x-transition>
                        <div @click.away="open = false" class="p-6 bg-gray-800 rounded-lg shadow-lg sm:h-screen md:w-2/4 h-fit " x-transition.scale>
                            <div class="flex items-center justify-center w-full p-2">
                                <img src="{{ asset('storage/' . $exp->foto) }}" alt="" class="w-full p-2">
                            </div>
                            <div class="w-2/3">
                                <h2 class="mb-4 text-xl font-bold">{{ $exp->judul }}</h2>
                                <p class="mb-4">{{ $exp->deskripsi }}</p>
                            </div>
                        </div>
                        <p class="text-gray-400">tap outside to close</p>

                    </div>
                </div>
            @endforeach
                            <div class="text-white">
                    {{ $exper->links() }}
                </div>

            @elseif ($exper->isEmpty())
            <div class="text-center text-gray-500">belum ada pengalaman</div>
            @endif
        </div>

        </div>
        <div class="w-full">

        </div>
      </section>
      <section class="flex items-center w-full min-h-screen text-white md:px-8 xl:px-20 bg-primary" id="skill">
        <div class="container flex flex-col items-center w-full gap-16 md:flex-row md:items-start">
          <!-- Left Side -->
          <div class="relative w-full p-6 md:w-1/2 sm:px-28 md:p-0">
            <div class="p-6 pl-10 pr-20 text-white sm:pl-10 lg:pr-20">
              <!-- Vertical Text -->

              <!-- Main Heading -->
              <h2 class="text-3xl font-bold leading-tight md:text-4xl xl:text-6xl">
                Explore My <span class="text-[#F5DD62]">Expertise</span> & Tech Stack
              </h2>
            </div>

            <p class="p-3 text-sm leading-relaxed text-gray-400">
              These are the tools and technologies that I use daily to develop web
              applications.
            </p>
            <span class="px-2 py-4 space-x-2 rounded-lg shadow-lg bg-secondary">
      </span>

          </div>

          <!-- Right Side (Static Icons Grid) -->
          <div class="flex items-center justify-center w-full md:w-1/2">
            <div class="grid grid-cols-3 gap-4 md:grid-cols-4">
              <!-- Static Icons -->
                @foreach ($skll as $skl)

              <div class="text-center">
                <div class="flex flex-col items-center justify-center p-4 rounded-lg shadow-lg bg-secondary">
                  <span class="text-4xl">
                    <img src="{{ asset('storage/'.$skl->icon) }}" alt="" class="">
                  </span>
                  <p class="mt-2 text-xs">{{ $skl->nama }}</p>
                </div>
              </div>
              @endforeach


            </div>
          </div>
        </div>
      </section>
      <section id="gallery" class="flex w-full min-h-screen text-white md:px-8 xl:px-20">
        <div class="w-full h-full ">
          <div class="w-full h-[10%] flex flex-col items-center justify-center p-4 text-center">
            <h1 class="text-3xl font-bold text-center capitalize">my gallery</h1>
            <p class="">this is an art that i made myself</p>
          </div>
          <div class="grid grid-cols-3 gap-4 m-4 md:grid-cols-4 lg:grid-cols-6">
                @foreach ($galleries as $ab)

            <div class="overflow-hidden transition-transform shadow-lg cursor-pointer hover:scale-105">
              <img src="{{ asset('storage/' . $ab->foto) }}" alt="" class="w-full h-auto rounded-lg" />
            </div>
            @endforeach

          </div>
        </div>

      </section>
      <section class="flex items-center h-full min-h-screen px-4 py-10 text-white bg-primary md:px-10 lg:px-20" id="cont">
        <div class="grid items-center max-w-6xl grid-cols-1 gap-12 mx-auto md:grid-cols-2">
          <!-- Left Side: Contact Details -->
          <div>
            <h2 class="text-3xl font-bold leading-tight md:text-4xl">
              Have You Any Question? <br />
              <span class="text-gray-300">Please Drop a Message</span>
            </h2>
            <p class="mt-4 text-gray-400">
              Get in touch and let me know how I can help. Fill out the form and
              I'll be in touch as soon as possible.
            </p>

            <div class="mt-6 space-y-4">
              <div class="flex items-start space-x-4">
                <span class="text-xl text-gray-400">📍</span>
                <div>
                  <p class="font-semibold">Address:</p>
                  <p class="text-gray-400">Kp. Anyar RT01/09, Desa pagelaran, Kec. ciomas, Kab. Bogor, Jawa Barat</p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <span class="text-xl text-gray-400">📞</span>
                <div>
                  <p class="font-semibold">Phone:</p>
                  <p class="text-gray-400">+62 81398954367</p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <span class="text-xl text-gray-400">✉️</span>
                <div>
                  <p class="font-semibold">Email:</p>
                  <p class="text-gray-400">alfajrizikri9@gmail.com</p>
                  <p class="text-gray-400">dzikrialfajri111@gmail.com</p>
                </div>
              </div>
            </div>

            <!-- Social Icons -->
            <div class="flex justify-center gap-4 mt-6 lg:justify-start">
              <a href="https://github.com/Dcaiser"
                class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden transition-all rounded-full group bg-neutral-950 text-neutral-200 hover:w-32">
                <span class="hidden mr-2 group-hover:inline whitespace-nowrap">GitHub</span>🐙
              </a>
              <a href="https://www.instagram.com/dzcaiser/?next=%2F"
                class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden transition-all bg-blue-900 rounded-full group text-neutral-200 hover:w-36">
                <span class="hidden mr-2 group-hover:inline whitespace-nowrap">Instagram</span>📷

              </a>
              <a href="https://www.facebook.com/share/1CqkSjqj6u/"
                class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden transition-all bg-blue-700 rounded-full group text-neutral-200 hover:w-36">
                <span class="hidden mr-2 group-hover:inline whitespace-nowrap">Facebook</span>📘
              </a>
              <a href="https://youtube.com/@inter_b7?si=qEvQLg7ldynpeQvX"
                class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden transition-all bg-red-800 rounded-full group text-neutral-200 hover:w-36">
                <span class="hidden mr-2 group-hover:inline whitespace-nowrap">YouTube</span>▶️
              </a>
            </div>
          </div>

          <!-- Right Side: Contact Form -->
          <div class="bg-[#171717] p-8 rounded-xl shadow-lg">
            @if(session('success'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 2000)"
                x-show="show"
                x-transition
                class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black bg-opacity-50">
                <div class="flex flex-col items-center justify-center w-3/4 bg-gray-600 h-3/4" x-transition.scale>
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#88FD6D" viewBox="0 0 24 24">
                        <path d="M20.285 6.709a1 1 0 00-1.414-1.418l-9.192 9.2-4.242-4.243a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0l10-10z"/>
                      </svg>

                    <h1 class="text-3xl uppercase">{{ session('success') }}</h1>
                </div>

            </div>
        @endif

            <form action="{{ route('post-cont') }}" method="POST">
                @csrf
              <div class="mb-4">
                <label class="block mb-2 text-gray-400">Name</label>
                <input type="text" placeholder="" name="nama" class="w-full px-4 py-3  text-white rounded-lg border bg-[#171717] border-gray-600 outline-none" required />
              </div>

              <div class="mb-4">
                <label class="block mb-2 text-gray-400">Email<span class="text-xs">(Required)</span></label>
                <input type="email" placeholder="" name="mail" class="w-full px-4 py-3  text-white rounded-lg border bg-[#171717] border-gray-600 outline-none" required/>
              </div>

              <div class="mb-4">
                <label class="block mb-2 text-gray-400">Phone</label>
                <input type="tel" placeholder="" name="telp" class="w-full px-4 py-3  text-white rounded-lg border bg-[#171717] border-gray-600 outline-none"required />
              </div>

              <div class="mb-4">
                <label class="block mb-2 text-gray-400">Message<span class="text-xs">(Required)</span></label>
                <textarea placeholder="Write message..." name="pesan" class="w-full px-4 py-3  text-white rounded-lg border bg-[#171717] border-gray-600 outline-none h-24" required></textarea>
              </div>

              <button type="submit" class="w-full py-3 font-semibold transition border-2 rounded-lg hover:bg-white hover:text-black">
                SEND
              </button>
            </form>
          </div>
        </div>
      </section>
      <footer class="">
        <div class="flex flex-col ">
            <main class="flex-grow">
                <!-- Content goes here -->
            </main>
            <footer class="bg-[#171717] text-white py-4">
                <div class="container mx-auto text-center">
                    <p>&copy; 2025 My Portofolio. All rights reserved.</p>
                </div>
            </footer>
        </div>
      </footer>
    </body>

</html>
