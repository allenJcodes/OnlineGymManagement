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
        <div class="flex flex-col h-fit bg-white rounded-lg p-6 md:w-1/2 xl:w-1/3">
            <div class="flex flex-col items-center justify-center w-full gap-2 mb-10">
                <img class="" src="{{ asset('images/logo.png') }}" alt="" height="120" width="120">
                <p class="text-xl">Japs Fitness Gym</p>
            </div>
            <form method="POST" action="{{ route('register') }}" autocomplete="on">
                @csrf
                <div class="form-field-container">
                    <label for="first_name" class="form-label">First Name</label>
                    <input id="first_name" type="text" name="first_name" class="form-input rounded-lg" placeholder="Juan">
                </div>
                <div class="form-field-container mt-3">
                    <label for="middle_name" class="form-label">Middle Name (optional)</label>
                    <input id="middle_name" type="text" name="middle_name" class="form-input rounded-lg" placeholder="">
                </div>
                <div class="form-field-container mt-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input id="last_name" type="text" name="last_name" class="form-input rounded-lg" placeholder="Dela Cruz">
                </div>
                <div class="form-field-container mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-input rounded-lg" placeholder="example@email.com">
                </div>
                <div class="form-field-container mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-input rounded-lg" placeholder="">
                </div>
                <div class="form-field-container mt-3 mb-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-input rounded-lg" placeholder="">
                </div>

                <div class="flex justify-center mt-4">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                </div>
            </form>
            <div class="flex justify-center pt-2">
                <a class="btn btn-link text-background/80 hover:text-gray-400 text-center" href="{{ route('login') }}">
                    Already have an account?
                </a>
            </div>
        </div>
    </div>
</body>

</html>