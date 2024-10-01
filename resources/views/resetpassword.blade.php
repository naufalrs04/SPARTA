<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19.5c-4.418 0-8.168-2.728-10.063-6.75C3.832 8.728 7.582 6 12 6c.818 0 1.61.099 2.367.288M15 12h3m-3 0a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0V9.75m0 2.25h2.25M15 12H9.75M15 12V9.75" />
                </svg>`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.807a10.062 10.062 0 00-.774 1.246C3.083 11.34 6.78 14.25 12 14.25s8.917-2.91 8.794-4.197c-.255-.471-.661-.965-1.197-1.47m-2.172 2.83a4.5 4.5 0 01-6.364-6.364m.33-.5c-.31-.311-.728-.619-1.206-.808a10.105 10.105 0 00-2.64-.465C6.02 3 3.26 5.25 3 8.25m12.867-1.302a4.5 4.5 0 01-6.364 6.364m.33-.5c-.31-.31-.728-.618-1.206-.807a10.105 10.105 0 00-2.64-.465c-2.138 0-4.213 1.017-5.685 2.485" />
                </svg>`;
            }
        }
    </script>
</head>

<body class="h-full">
    <div class="bg-cover bg-center p-12 text-center w-full h-full flex flex-col items-center justify-center" style="background-image: url('{{ asset('assets/background_login_page.jpg') }}');">
        <img class="mb-10" src="{{ asset('assets/Logo.png') }}" alt="Logo" style="height: 15%; width: auto;">

        <div class="rounded-lg shadow-lg p-10 w-full max-w-sm" style="background-color: #23252A">
            <a href="login" class="underline underline-offset-4 justify-start text-white items-start text-start">< Kembali</a>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mb-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Reset Password</h2>
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
                <form action="{{ route('resetpassword') }}" method="POST">
                    @csrf
                    <div class="my-6 relative">
                        <input placeholder="Password" id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md bg-gray-700 border border-gray-600 py-2 px-3 text-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none pr-10">
                        
                    </div>
                    <div class="my-6">
                        <h2 class="text-start font-bold leading-9 tracking-tight text-white">Kami akan mengirimkan email konfirmasi reset password ke alamat alternatif terdaftar anda.</h2>
                    </div>
                    <div class="my-6">
                        <button type="submit" class="justify-center rounded-md py-3 px-10 text-sm font-semibold text-white focus:ring-2" style="background-color:#0A4867">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
