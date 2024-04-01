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

    <div class="flex h-full justify-center font-red-hat-display md:px-0">
        <div class="flex flex-col h-fit bg-white rounded-lg px-6 py-8 md:w-1/2 xl:w-1/3 my-32">
            <div class="flex flex-col items-center justify-center w-full gap-2 mb-10">
                <img class="" src="{{ asset('images/logo.png') }}" alt="" height="120" width="120">
                <p class="text-xl">Japs Fitness Gym</p>
            </div>


            <div class="card">
                <div class="card-header font-bold">{{ __('Reset Your Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 font-medium"
                            role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <div class="form-field-container">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email"
                                    class="form-input rounded-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    {{ __('Send Password Reset Link') }}</button>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('login') }}" class="hover:text-gray-400 text-background/80">Return to
                                login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
