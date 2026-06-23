<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GameVerse Studios</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background: #030712;
        }

        .glass {
            background: rgba(15, 23, 42, .85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, .15);
        }

        .neon {
            box-shadow: 0 0 25px rgba(168, 85, 247, .35);
        }

        .bg-gamer {
            background:
                linear-gradient(rgba(3, 7, 18, .75),
                    rgba(3, 7, 18, .85)),
                url('https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1600');
            background-size: cover;
            background-position: center;
        }

        .logo-glow {
            text-shadow:
                0 0 10px #9333ea,
                0 0 20px #9333ea;
        }
    </style>

</head>

<body>

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Lado esquerdo -->

        <div class="bg-gamer hidden lg:flex items-center justify-center">

            <div class="text-center px-10">

                <div class="text-7xl mb-6">
                    🎮
                </div>

                <h1 class="text-6xl font-bold text-white logo-glow">
                    GAMEVERSE
                </h1>

                <p class="text-purple-300 text-xl mt-4">
                    Studios
                </p>

                <p class="text-gray-300 mt-10 text-lg">
                    Gerencie jogos, desenvolvedores e torneios
                    em um único painel profissional.
                </p>

            </div>

        </div>

        <!-- Lado direito -->

        <div class="flex items-center justify-center p-8">

            <div class="glass neon w-full max-w-md rounded-3xl p-10">

                <div class="text-center mb-8">

                    <div class="text-5xl mb-4">
                        🎮
                    </div>

                    <h2 class="text-white text-4xl font-bold">
                        Bem-vindo
                    </h2>

                    <p class="text-gray-400 mt-2">
                        Faça login para acessar o painel
                    </p>

                </div>

                @if(session('erro'))

                    <div class="bg-red-600 text-white p-3 rounded-lg mb-4">
                        {{ session('erro') }}
                    </div>

                @endif

                <form action="/login" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="text-gray-300 text-sm">
                            E-mail
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-envelope absolute left-4 top-4 text-purple-400"></i>

                            <input type="email" name="email" placeholder="admin@admin.com"
                                class="w-full bg-slate-900 text-white p-4 pl-12 rounded-xl mt-2 border border-purple-900 focus:outline-none focus:border-purple-500">

                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="text-gray-300 text-sm">
                            Senha
                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-lock absolute left-4 top-4 text-purple-400"></i>

                            <input type="password" name="password" placeholder="********"
                                class="w-full bg-slate-900 text-white p-4 pl-12 rounded-xl mt-2 border border-purple-900 focus:outline-none focus:border-purple-500">

                        </div>

                    </div>

                    <div class="flex justify-between items-center mb-6">

                        <label class="flex items-center text-gray-400 text-sm">

                            <input type="checkbox" class="mr-2">

                            Lembrar-me

                        </label>

                        <a href="#" class="text-purple-400 hover:text-purple-300 text-sm">
                            Esqueceu a senha?
                        </a>

                    </div>

                    <button type="submit"
                        class="w-full bg-purple-600 hover:bg-purple-700 transition p-4 rounded-xl text-white font-bold">

                        Entrar

                    </button>

                </form>

                <div class="text-center mt-8 text-gray-500 text-sm">

                    © {{ date('Y') }} GameVerse Studios

                </div>

            </div>

        </div>

    </div>

</body>

</html>