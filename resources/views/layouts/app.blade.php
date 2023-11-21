<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito:400,700&display=swap" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body class="font-[Nunito] flex flex-col justify-between h-screen">
    <div class="bg-gray-800 text-gray-300 py-8 shadow-xl">
        <div class="max-w-5xl mx-auto px-3">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl">
                    <a href="/">WebFlix</a>
                </h1>
                <nav class="space-x-3">
                    <a class="hover:underline underline-offset-8" href="/">Accueil</a>
                    <a class="hover:underline underline-offset-8" href="/categories">Catégories</a>
                    <a class="hover:underline underline-offset-8" href="/films">Films</a>
                    <a class="hover:underline underline-offset-8" href="/fiorella">Présentation</a>
                    <a class="hover:underline underline-offset-8" href="/fiorella/emma?color=bleu">Fiorella Bleue et
                        Emma</a>
                    <a class="hover:underline underline-offset-8" href="/a-propos">A propos</a>
                    @auth
                        <a class="" href="/logout"> {{ Auth::user()->email }} </a>
                    @else
                        <a href="/login">Connexion</a>
                    @endauth
                </nav>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-3 py-8 w-full">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-gray-300 py-8">
        <div class="max-w-5xl mx-auto px-3">
            <p class="text-center text-xl">WebFlix &copy; {{ date('Y') }}</p>
        </div>
    </footer>
</body>

</html>
