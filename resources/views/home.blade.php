<x-layout>
    <header class="bg-accent relative h-36">
        <div class="absolute bottom-0 px-5">
            <div class="text-bgc gap-5 flex flex-1 flex-col-reverse sm:flex-row justify-between items-end px=5">
                <p class="text-7xl md:text-9xl font-extrabold"><b>preper</b></p>
                <p class="text-right text-wrap py-3 hidden sm:inline">Platform Digital untuk Mentor Relawan dan Mentee.</p>
            </div>
        </div>
    </header>

    <div class="h-200 p-10 flex-col">
        <div class = 'text-2xl pb-6 text-justify'>
            <b>Preper</b> adalah sebuah platform digital yang dirancang untuk memfasilitasi koneksi antara relawan <b>mentor</b> dan <b>mentee</b> berbasis <b>online meeting</b> di <b>Indonesia</b> dalam berbagai bidang. <b>Daftar</b> sekarang dengan mengklik tombol <b>“Chat Sekarang!”</b> dibawah ini dan mengirim pesan WhatsApp ke preper.
        </div>
        <div class='flex justify-center text-2xl '>
            <a href='http://wa.me/62812000000' target="_blank">
                <x-button>
                    Chat Sekarang!
                </x-button>
            </a>
        </div>
    </div>
    <div class="h-200 p-10 flex-col">
        <div class = 'text-4xl md:text-7xl'>
            <b>Bebas Biaya 100%</b>
        </div>
        <div class="text-2xl pb-6 pt-3 text-justify">
            <b>Preper</b> menggunakan <b>sistem relawan</b> sebagai fondasi utama dalam menyediakan layanan mentoring kepada pengguna. Oleh sebab itu, platform kami <b>tidak berbayar</b> dan dapat diakses secara <b>gratis</b>.
        </div>
    </div>
    <div class="h-200 p-10 flex-col">
        <div class="text-4xl md:text-7xl text-end">
            <b>Sederhana dan Cepat</b>
        </div>
        <div class="pb-6 pt-3 text-end text-2xl">
            <b>Preper</b> menggunakan <b>WhatsApp</b> untuk menyederhanakan dan mempercepat proses <b>pendaftaran</b> serta <b>penjadwalan</b>.
        </div>
    </div>
    <div class="h-200 p-10 flex-col">
        <div class="text-4xl text-center md:text-7xl">
            <b>Anggota Komunitas</b>
        </div>
        <div class = 'flex flex-wrap justify-center gap-2 md:gap-28 p-5'>
            <div>
                @include('svg.logo1')
            </div>
            <div>
                @include('svg.logo2')
            </div>
        </div>
    </div>
    <div class="h-200 p-10 flex-col">
        <div class="text-4xl md:text-7xl text-center">
            <b>Didukung Oleh</b>
        </div>
        <div class="text-7xl text-center">
            -
        </div>
        <div class="text-2xl pb-6 pt-3 text-center">
            Ingin menjadi sponsor? <a class="text-accent">Hubungi kami</a>
        </div>
    </div>
    <div class="h-200 flex items-center justify-center bg-accent mb-3 text-white space-x-20" onclick="window.scrollTo(0, 0);">
        <div>
            <div class="text-4xl md:text-7xl text-justify pt-10 pl-10">
                <b>Daftar Sekarang!</b>
            </div>
            <div class="text-2xl pb-6 pt-3 text-justify pt-10 pl-10">
                Kirim pesan <b>WhatsApp</b> ke <b>preper</b>, isi data form pada link yang diberikan, kamu sudah bergabung dan siap menjadi <b>mentee/mentor relawan</b>.
            </div>
        </div>
        <div class="bg-white hidden md:inline">
           @include('./svg.arrow')
        </div>
        <div>
        </div>
    </div>
</x-layout>
