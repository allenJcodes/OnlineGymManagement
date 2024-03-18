<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- FLOWBITE --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    body {
        /* font-family: 'Nunito', sans-serif; */
        background-color: #212529;
    }
</style>

<body>
    <div class="flex h-screen justify-center font-red-hat-display md:px-0 py-32">
        <div class="flex flex-col h-fit bg-white rounded-lg p-6 md:w-1/2 xl:w-1/3 gap-10">
            <div class="flex flex-col items-center justify-center w-full gap-2">
                <img class="" src="{{ asset('images/logo.png') }}" alt="" height="120" width="120">
                <p class="text-xl">Japs Online Fitness Gym</p>
            </div>
            <br>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-field-container">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="text" name="email" class="form-input rounded-lg" value="{{ old('email')}}" placeholder="" autocomplete="email" required>
                </div>
                <div class="form-field-container mt-2">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-input rounded-lg" value="{{ old('email')}}" placeholder="" autocomplete="current-password" required>
                </div>

                @if ($errors->any())
                    <div class="flex flex-col gap-1 mt-1">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-xs">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="flex justify-between items-center mt-2 mb-6">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" name="remember" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 border border-gray-600 rounded">
                        </div>
                        <label for="remember" class="ml-2 text-sm text-background/80">Remember me</label>
                    </div>
                    <a class="text-sm text-background/80 hover:text-gray-400" href="{{ route('password.request') }}">
                        Forget your password?
                    </a>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>


                </div>
                <div class="flex justify-center pt-2">
                    <a class="btn btn-link text-background/80 hover:text-gray-400 text-center" href="{{ route('register') }}">
                        Register here!
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
