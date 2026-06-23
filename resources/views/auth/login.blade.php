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

        body{
            background:#020617;
            overflow:hidden;
        }

        .bg-gamer{

            background:
                linear-gradient(
                    rgba(2,6,23,.82),
                    rgba(2,6,23,.88)
                ),
                url('https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1600');

            background-size:cover;
            background-position:center;
            position:relative;
        }

        .bg-gamer::after{

            content:'';
            position:absolute;
            inset:0;

            background:
                radial-gradient(
                    circle at center,
                    rgba(168,85,247,.20),
                    transparent 60%
                );
        }

        .glass{

            background:rgba(15,23,42,.70);

            backdrop-filter:blur(24px);

            border:1px solid rgba(168,85,247,.15);

            box-shadow:
                0 8px 32px rgba(0,0,0,.25),
                0 0 40px rgba(168,85,247,.10);

        }

        .logo-glow{

            text-shadow:
                0 0 10px #9333ea,
                0 0 25px #9333ea,
                0 0 50px #9333ea;

        }

        .input-style{

            background:rgba(15,23,42,.85);

            border:1px solid rgba(168,85,247,.20);

            transition:.3s;

        }

        .input-style:focus{

            border-color:#a855f7;

            box-shadow:
                0 0 15px rgba(168,85,247,.30);

        }

        .float{

            animation:float 5s ease-in-out infinite;

        }

        @keyframes float{

            0%,100%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-10px);
            }

        }

    </style>

</head>

<body>

<div class="min-h-screen grid lg:grid-cols-2">

    <!-- COLUNA ESQUERDA -->

    <div class="bg-gamer hidden lg:flex items-center justify-center relative">

        <div class="relative z-10 text-center max-w-2xl px-10">

            <div class="float text-8xl mb-8">
                🎮
            </div>

            <h1 class="text-7xl font-black text-white logo-glow">
                GAMEVERSE
            </h1>

            <p class="text-purple-300 text-2xl mt-4">
                Studios
            </p>

            <p class="text-gray-300 text-xl mt-10 leading-relaxed">

                Plataforma profissional para gerenciamento
                de jogos, desenvolvedores e torneios.

            </p>

            <div class="grid grid-cols-3 gap-6 mt-16">

                <div class="glass rounded-3xl p-6">

                    <h3 class="text-4xl font-bold text-purple-400">
                        500+
                    </h3>

                    <p class="text-gray-400 mt-2">
                        Jogos
                    </p>

                </div>

                <div class="glass rounded-3xl p-6">

                    <h3 class="text-4xl font-bold text-purple-400">
                        120+
                    </h3>

                    <p class="text-gray-400 mt-2">
                        Devs
                    </p>

                </div>

                <div class="glass rounded-3xl p-6">

                    <h3 class="text-4xl font-bold text-purple-400">
                        50+
                    </h3>

                    <p class="text-gray-400 mt-2">
                        Torneios
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- COLUNA DIREITA -->

    <div class="flex items-center justify-center p-8">

        <div class="glass w-full max-w-lg rounded-32px p-10">

            <div class="text-center mb-10">

                <div class="text-6xl mb-5">
                    🎮
                </div>

                <h2 class="text-white text-5xl font-black">
                    Bem-vindo
                </h2>

                <p class="text-gray-400 mt-3">
                    Faça login para acessar o painel
                </p>

            </div>

            @if(session('erro'))

                <div
                    class="bg-red-500/20 border border-red-500/30 text-red-300 rounded-2xl p-4 mb-6">

                    {{ session('erro') }}

                </div>

            @endif

            <form action="/login" method="POST">

                @csrf

                <!-- EMAIL -->

                <div class="mb-5">

                    <label class="text-gray-300 text-sm">
                        E-mail
                    </label>

                    <div class="relative mt-2">

                        <i
                            class="fa-solid fa-envelope absolute left-5 top-5 text-purple-400">
                        </i>

                        <input
                            type="email"
                            name="email"
                            placeholder="admin@admin.com"
                            required
                            class="input-style w-full text-white rounded-2xl p-4 pl-14 outline-none">

                    </div>

                </div>

                <!-- SENHA -->

                <div class="mb-5">

                    <label class="text-gray-300 text-sm">
                        Senha
                    </label>

                    <div class="relative mt-2">

                        <i
                            class="fa-solid fa-lock absolute left-5 top-5 text-purple-400">
                        </i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="********"
                            required
                            class="input-style w-full text-white rounded-2xl p-4 pl-14 pr-14 outline-none">

                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-5 top-4 text-purple-400">

                            <i id="eyeIcon"
                                class="fa-solid fa-eye">
                            </i>

                        </button>

                    </div>

                </div>

                <!-- OPÇÕES -->

                <div class="flex justify-between items-center mb-8">

                    <label
                        class="flex items-center text-gray-400 text-sm">

                        <input
                            type="checkbox"
                            class="mr-2">

                        Lembrar-me

                    </label>

                    <a
                        href="#"
                        class="text-purple-400 hover:text-purple-300 text-sm">

                        Esqueceu a senha?

                    </a>

                </div>

                <!-- BOTÃO -->

                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl font-bold text-lg bg-gradient-to- from-purple-600 to-fuchsia-600 hover:scale-105 transition-all duration-300 shadow-lg shadow-purple-500/30">

                    Entrar no Painel

                </button>

            </form>

            <div class="mt-8 text-center">

                <p class="text-green-400 text-sm">
                    🔒 Conexão Segura
                </p>

                <p class="text-gray-500 text-sm mt-4">
                    © {{ date('Y') }} GameVerse Studios
                </p>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('eyeIcon');

    if(password.type === 'password'){

        password.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

    }else{

        password.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

    }

}

</script>

</body>
</html>