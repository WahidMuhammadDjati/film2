@vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <section style="background-image: url('{{ asset('storage/images/film.jpg') }}');" class="bg-cover bg-center min-h-screen">
        <div class="bg-black bg-opacity-20 min-h-screen flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <a href="#" class="flex items-center mb-6 text-5xl font-semibold text-white">
                Review Film
            </a>
            @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Masuk ke akun anda
                    </h1>
                    <form class="space-y-4 md:space-y-6" name="login" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email..." required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="password..." class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Masuk</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Tidak punya akun? <a href="{{ route ('registrasi') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Buat akun</a>
                        </p>
                        @if ($errors->any())
                        <div x-data="{ showModal: true }" x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-500 bg-opacity-50">
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <h2 class="text-lg font-semibold text-red-600">Kesalahan</h2>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button @click="showModal = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
                            </div>
                        </div>
                    @endif                    
                    </form>
                </div>
            </div>
        </div>
    </section>
     