<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GameVerse Studios</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            scroll-behavior:smooth;
        }

        body{
            min-height:100vh;
            background:
                radial-gradient(circle at top left,#7c3aed 0%,transparent 30%),
                radial-gradient(circle at bottom right,#4338ca 0%,transparent 30%),
                #020617;
        }

        .glass{
            background:rgba(15,23,42,.55);
            backdrop-filter:blur(20px);
            border:1px solid rgba(168,85,247,.12);
            box-shadow:
                0 8px 32px rgba(0,0,0,.25),
                inset 0 1px rgba(255,255,255,.04);
        }

        .sidebar{
            background:rgba(2,6,23,.92);
            backdrop-filter:blur(25px);
            border-right:1px solid rgba(168,85,247,.12);
        }

        .neon{
            box-shadow:
                0 0 25px rgba(168,85,247,.20);
        }

        .menu-item{
            transition:.3s;
        }

        .menu-item:hover{
            transform:translateX(8px);
            background:rgba(168,85,247,.12);
        }

        .menu-item.active{
            background:rgba(168,85,247,.18);
            border:1px solid rgba(168,85,247,.25);
            color:#c084fc;
        }

        .scrollbar::-webkit-scrollbar{
            width:8px;
        }

        .scrollbar::-webkit-scrollbar-thumb{
            background:#7c3aed;
            border-radius:999px;
        }

    </style>

</head>

<body class="text-white">

<div class="flex">

    <!-- SIDEBAR -->

    <aside
        class="sidebar fixed top-0 left-0 h-screen w-80 flex flex-col">

        <!-- LOGO -->

        <div class="p-8 border-b border-purple-500/10">

            <div class="flex items-center gap-4">

                <div
                    class="w-16 h-16 rounded-3xl bg-gradient-to- from-purple-500 to-indigo-600 flex items-center justify-center text-3xl shadow-lg shadow-purple-500/30">

                    🎮

                </div>

                <div>

                    <h1 class="text-3xl font-black">

                        <span class="text-purple-400">
                            GAME
                        </span>VERSE

                    </h1>

                    <p class="text-gray-400">
                        Studios Dashboard
                    </p>

                </div>

            </div>

        </div>

        <!-- PERFIL -->

        <div class="p-6">

            <div class="glass rounded-3xl p-4">

                <div class="flex items-center gap-4">

                    <div
                        class="w-14 h-14 rounded-full bg-gradient-to- from-purple-500 to-indigo-500 flex items-center justify-center text-xl font-bold">

                        A

                    </div>

                    <div>

                        <h3 class="font-semibold">
                            Administrador
                        </h3>

                        <p class="text-green-400 text-sm">
                            ● Online
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- MENU -->

        <nav class="px-5 flex-1 overflow-y-auto scrollbar">

            <div class="space-y-2">

                <a href="/dashboard"
                    class="menu-item active flex items-center gap-4 p-4 rounded-2xl">

                    <i class="fa-solid fa-chart-line text-xl"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

                <a href="/jogos"
                    class="menu-item flex items-center gap-4 p-4 rounded-2xl">

                    <i class="fa-solid fa-gamepad text-xl text-purple-400"></i>

                    <span>
                        Jogos
                    </span>

                </a>

                <a href="/desenvolvedores"
                    class="menu-item flex items-center gap-4 p-4 rounded-2xl">

                    <i class="fa-solid fa-code text-xl text-purple-400"></i>

                    <span>
                        Desenvolvedores
                    </span>

                </a>

                <a href="/torneios"
                    class="menu-item flex items-center gap-4 p-4 rounded-2xl">

                    <i class="fa-solid fa-trophy text-xl text-purple-400"></i>

                    <span>
                        Torneios
                    </span>

                </a>

            </div>

            <div class="mt-10">

                <p class="text-xs uppercase text-gray-500 px-4 mb-4">

                    Extras

                </p>

                <div class="space-y-2">

                    <a href="#"
                        class="menu-item flex items-center gap-4 p-4 rounded-2xl">

                        <i class="fa-solid fa-chart-pie text-xl text-purple-400"></i>

                        Estatísticas

                    </a>

                    <a href="#"
                        class="menu-item flex items-center gap-4 p-4 rounded-2xl">

                        <i class="fa-solid fa-gear text-xl text-purple-400"></i>

                        Configurações

                    </a>

                </div>

            </div>

        </nav>

        <!-- RODAPÉ -->

        <div class="p-6 border-t border-purple-500/10">

            <form action="/logout" method="POST">
                @csrf

                <button
                    class="w-full py-4 rounded-2xl bg-gradient-to- from-purple-600 to-fuchsia-600 hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

                    <i class="fa-solid fa-right-from-bracket mr-2"></i>
                    Sair

                </button>

            </form>

            <div class="mt-5 text-center">

                <p class="text-xs text-gray-500">
                    GameVerse Studios
                </p>

                <p class="text-xs text-gray-600">
                    © 2026
                </p>

            </div>

        </div>

    </aside>

    <!-- CONTEÚDO -->

    <main class="ml-80 flex-1 p-8">

        <!-- TOPBAR -->

        <div
            class="glass rounded-3xl px-8 py-5 mb-8 flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-bold">
                    Painel Administrativo
                </h2>

                <p class="text-gray-400">
                    Bem-vindo ao GameVerse Studios
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div
                    class="glass px-4 py-3 rounded-xl flex items-center gap-3">

                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>

                    <input
                        type="text"
                        placeholder="Pesquisar..."
                        class="bg-transparent outline-none">

                </div>

                <button
                    class="glass w-12 h-12 rounded-xl hover:bg-purple-600/20 transition">

                    <i class="fa-solid fa-bell"></i>

                </button>

            </div>

        </div>

        @yield('content')

    </main>

</div>

</body>
</html>