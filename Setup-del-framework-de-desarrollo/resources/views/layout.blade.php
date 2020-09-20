<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @section("css")
    <!-- Fonts -->

    <link rel="stylesheet" href="/css/app.css">
    @show
</head>

<body>
    <header class="bg-primary">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-sm">
                    <h1 class="text-center text-white">Setup Framework de desarrollo</h1>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <x-navbar />
    </nav>
    <section>
        <article>
            @yield("article")
        </article>
    </section>
    <footer>
    </footer>
    @section("js")
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    @show
</body>

</html>