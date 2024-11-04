<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/faviconD-96x96.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" fill="white"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" fill="white"/>`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" fill="white"/>
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" fill="white"/>
                <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" fill="white"/>`;
            }
        }
    </script>

</head>

<body class="h-full">
    <div class="bg-cover bg-center p-12 text-center w-full h-full flex flex-col items-center justify-center" style="background-image: url('{{ asset('assets/background_login_page.jpg') }}');">
        <img class="mb-10" src="{{ asset('assets/Logo.png') }}" alt="Logo" style="height: 15%; width: auto;">

        <div class="rounded-lg shadow-lg p-10 w-full max-w-sm " style="background-color: #23252A">
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
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="my-6">
                        <div>
                            <input placeholder="Masukkan Email" id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md bg-gray-700 border border-gray-600 py-2 px-3 text-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>
                    </div>
                    <div class="my-6">
                        <div class="flex justify-start">
                            <p class="text-white text-left">Kami akan mengirimkan email konfirmasi reset password ke alamat alternatif terdaftar anda.</p>
                        </div>
                    </div>
                    <div class="my-6 mb-1">
                        <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-500  hover:from-orange-600 hover:to-red-600 focus:outline-none justify-center rounded-md py-3 px-10 text-sm font-semibold text-white focus:ring-2 mt-6" >Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
