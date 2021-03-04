<section class="w-full px-8 py-16 bg-white xl:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">

            <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                <p class="font-medium text-blue-500 uppercase">Welcome</p>
                <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                    Manage your redirections without any worries
                </h2>
                <p class="text-xl text-gray-600 md:pr-16">SimpleRedirection.php is a <code class="text-purple-700 text-sm">PHP</code> script, short and simple, whithout any database, that allow your users to be redirected from <code class="text-purple-700 text-sm"><?= $url ?>google</code> to <code class="text-purple-700 text-sm">https://google.com/</code>, try now !</p>
            </div>

            <div class="w-full mt-16 md:mt-0 md:w-2/5">
                <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                    <h3 class="mb-6 text-2xl font-medium text-center">Login</h3>
                    
                    <form action="/" method="post" name="Login_Form">
	                    <input type="text" name="email" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Email address">
	                    <input type="password" name="password" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Password">
	                    <div class="block">
	                        <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Login</button>
	                    </div>
	                </form>

                    <p class="w-full mt-4 text-sm text-center text-gray-500">No account yet? Edit the file : <code class="text-purple-700 text-sm">/data/logins.php</code></p>
                </div>
            </div>

        </div>
    </div>
</section>