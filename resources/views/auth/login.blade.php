<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Admin Panel</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-2xl shadow-2xl rounded-3xl border border-white/10 p-10 animate-fade-in">

        <!-- HEADER -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-xl">Admin Login</h1>
            <p class="text-gray-300 text-sm mt-2">Akses kontrol sistem secara aman</p>
        </div>

        <!-- SESSION STATUS -->
        @if (session('status'))
            <div class="mb-4 p-3 rounded-lg bg-green-500/20 text-green-300 font-semibold border border-green-500/30">
                {{ session('status') }}
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="text-gray-200 font-semibold">Email</label>
                <div class="relative mt-2">
                    <input
                        type="email"
                        name="email"
                        required
                        autofocus
                        placeholder="admin@example.com"
                        class="w-full px-4 py-3 rounded-2xl bg-white/15 text-white placeholder-gray-400
                               focus:ring-2 focus:ring-indigo-400 outline-none border border-white/10"
                    />
                </div>
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="text-gray-200 font-semibold">Password</label>
                <div class="relative mt-2">
                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-2xl bg-white/15 text-white placeholder-gray-400
                               focus:ring-2 focus:ring-indigo-400 outline-none border border-white/10"
                    />
                </div>
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- SUBMIT BUTTON -->
            <button
                type="submit"
                class="w-full py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold
                       text-lg shadow-lg transition-all transform hover:scale-[1.03] active:scale-[0.98]"
            >
                Login
            </button>
        </form>

        <!-- FOOTER -->
        <div class="text-center mt-8 text-xs text-gray-500">
            © {{ date('Y') }} Admin Panel. All rights reserved.
        </div>

    </div>

</body>
</html>
