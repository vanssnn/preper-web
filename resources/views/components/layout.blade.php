<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Preper</title>
        @vite('resources/css/app.css')

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        
    <body class="bg-bgc">
        <nav class="bg-accent flex justify-end px-5 text-bgc text-center py-7 gap-4">
            <a href="#"><p>BERANDA</p></a>
            <a href="#"><p>TENTANG KAMI</p></a>
        </nav>

        {{ $slot }}

        <footer class="bg-accent flex flex-col gap-y-2 text-bgc text-center p-5">
            <div class="flex justify-center">
                <span>
                    <a href="#">
                        <img src="{{ Vite::asset('resources/assets/logo.svg')}}" alt="Logo">
                    </a>
                </span>
            </div>
            
            <p>  
                Copyright Ⓒ 2024 Preper Project Authors. All Right Reserved
            </p>
            <p>
                <a href=""><u>Tentang Kami</u></a> | <a href=""><u>Hubungi Kami</u></a>
            </p>

        </footer>
    </body>
</html>
