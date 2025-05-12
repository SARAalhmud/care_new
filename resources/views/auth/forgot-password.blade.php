@if ($errors->any())
    <div class="mb-4 p-3 rounded text-sm text-red-400 border border-red-600 bg-red-900">
        ❌ {{ $errors->first() }}
    </div>
@endif
@if (session('status'))
    <div class="mb-4 p-3 rounded text-sm text-green-400 border border-green-600 bg-green-900">
        ✅ {{ session('status') }}
    </div>
@endif
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>استعادة كلمة المرور</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center">
        <!-- نموذج إعادة تعيين -->
        <form method="POST" action="{{ route('password.email') }}" class="bg-black p-6 rounded-lg shadow-md border border-yellow-500 w-full max-w-md">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-yellow-500 font-semibold mb-2">📧 البريد الإلكتروني</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full p-2 bg-black text-white border border-yellow-500 rounded focus:outline-none focus:ring focus:ring-yellow-400"
                />
            </div>

            <div class="flex justify-end mt-4">
                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded shadow transition duration-200"
                >
                    🚀 أرسل رابط إعادة التعيين
                </button>
            </div>
        </form>
    </div>

</body>
</html>
