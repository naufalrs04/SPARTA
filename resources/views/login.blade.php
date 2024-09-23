<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.src = '{{ asset('assets/eye-open.png') }}'; 
            } else {
                passwordInput.type = 'password';
                toggleButton.src = '{{ asset('assets/eye-closed.png') }}';
            }
        }
    </script>
</head>

<body class="h-full">
    <div class="bg-cover bg-center p-12 text-center w-full h-full flex flex-col items-center justify-center" style="background-image: url('{{ asset('assets/background_login_page.jpg') }}');">
        <img class="mb-10 h-12 w-auto" src="{{ asset('assets/Logo.png') }}" alt="Logo">

        <div class="rounded-lg shadow-lg p-8 w-full max-w-sm" style="background-color: #23252A">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mb-14 text-center text-2xl font-bold leading-9 tracking-tight text-white">Log in to your account</h2>
            </div>

            <div class="mt-8">
                @if ($errors->any())
                <div class="bg-red-500 text-white p-2 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <div class="mt-2">
                            <input placeholder="Email" id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md bg-gray-700 border border-gray-600 py-2 px-3 text-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <div class="mt-2 flex items-center relative">
                            <input placeholder="Password" id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md bg-gray-700 border border-gray-600 py-2 px-3 text-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none pr-10">
                            <img id="togglePassword" src="{{ asset('assets/eye-closed.png') }}" alt="Toggle Password" class="absolute top-3 right-2 cursor-pointer" onclick="togglePasswordVisibility()" style="width: 25px; height: 20px">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="mt-5 justify-center rounded-md py-3 px-10 text-sm font-semibold text-white focus:ring-2" style="background-color:#0A4867">Login</button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-gray-400">
                    Forgot your password ?
                    <a href="#" class="font-semibold italic text-blue-400 hover:underline">Reset password</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
