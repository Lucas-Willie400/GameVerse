<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GameVerse Studios</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background:
                radial-gradient(circle at top left, #5b21b6, #030712 40%);
            min-height: 100vh;
        }

        .glass {
            background: rgba(15, 23, 42, .7);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, .15);
        }

        .sidebar {
            background: rgba(2, 6, 23, .85);
            backdrop-filter: blur(20px);
        }

        .neon {
            box-shadow: 0 0 20px rgba(168, 85, 247, .35);
        }
    </style>

</head>

<body class="text-white">

    <div class="flex">

        <!-- Sidebar -->

        <aside class="sidebar w-72 min-h-screen fixed p-6">

            <div class="mb-10">

                <h1 class="text-3xl font-bold text-purple-400">
                    🎮 GAMEVERSE
                </h1>

                <p class="text-gray-400">
                    Studios
                </p>

            </div>

            <nav class="space-y-3">

                <a href="/dashboard" class="block glass p-4 rounded-xl hover:bg-purple-700/20">

                    <i class="fa-solid fa-chart-line mr-3"></i>
                    Dashboard

                </a>

                <a href="/jogos" class="block glass p-4 rounded-xl hover:bg-purple-700/20">

                    <i class="fa-solid fa-gamepad mr-3"></i>
                    Jogos

                </a>

                <a href="/desenvolvedores" class="block glass p-4 rounded-xl hover:bg-purple-700/20">

                    <i class="fa-solid fa-code mr-3"></i>
                    Desenvolvedores

                </a>

                <a href="/torneios" class="block glass p-4 rounded-xl hover:bg-purple-700/20">

                    <i class="fa-solid fa-trophy mr-3"></i>
                    Torneios

                </a>

            </nav>

            <form action="/logout" method="POST" class="mt-10">
                @csrf

                <button class="w-full bg-purple-600 hover:bg-purple-700 p-3 rounded-xl">
                    Sair
                </button>

            </form>

        </aside>

        <main class="ml-72 w-full p-8">

            @yield('content')

        </main>

    </div>

</body>

</html>