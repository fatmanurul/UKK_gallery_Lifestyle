<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Life Style</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/templatemo-style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        @include('main.layouts.header')  
        
        <div class="tm-hero d-flex justify-content-center align-items-center"       data-parallax="scroll" data-image-src="{{asset('assets/img/hero2.jpg') }}">
            <h1 class="h1">
                Show Your Lifestyle 
            </h1>
        </div>

        <section class="section">
            <main>
              @yield('container')
            </main>
        </section>
                

        {{-- menampilkan footer --}}
    <footer class="main-footer">
        @include('main.layouts.footer')
    </footer>

        <script src="{{asset('assets/js/plugins.js') }}"></script>
            <script>
                $(window).on("load", function() {
                    $('body').addClass('loaded');
                });
            </script>
    </body>
</html>