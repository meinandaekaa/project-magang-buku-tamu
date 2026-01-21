<!DOCTYPE html>
<html lang="id" x-data="{ show: false }">
<head>
    <meta charset="UTF-8">
    <title>Login | Buku Tamu</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600">

    <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg">

        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
             Login
        </h2>

        @if($errors->any())
            <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email"
                       value="{{ old('email') }}"
                       class="w-full mt-1 px-4 py-2 rounded-lg border
                              focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-sm text-gray-600">Password</label>

                <div class="relative">
                    <input :type="show ? 'text' : 'password'"
                           name="password"
                           class="w-full mt-1 px-4 py-2 rounded-lg border
                                  focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>

                    <button type="button"
                            @click="show = !show"
                            class="absolute right-3 top-3 text-sm text-gray-500">
                        👁
                    </button>
                </div>
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-blue-600 text-white py-2 rounded-lg
                           hover:bg-blue-700 transition font-medium">
                Masuk
            </button>
        </form>

        <p class="text-xs text-center text-gray-500 mt-6">
            © {{ date('Y') }} Sistem Buku Tamu Dinas Kominfo Kab.Ponorogo
        </p>
    </div>

</body>
</html>