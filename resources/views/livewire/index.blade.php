<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            @guest
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">To access all features, please log in.</h2>
                    <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">If you don't have an account, please request it from your CRM administrator.</p>
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Login to your account </a>
                </div>
            @endguest
            @auth
                hello!
            @endauth
        </div>
    </section>
</div>
