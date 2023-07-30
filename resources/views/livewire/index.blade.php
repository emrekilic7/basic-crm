<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="container mx-auto p-4 w-full">
            @guest
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">To access all features, please log in.</h2>
                    <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">If you don't have an account, please request it from your CRM administrator.</p>
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Login to your account </a>
                </div>
            @endguest
            @auth
            <div class="grid grid-cols-3 gap-2">
                <article
                  class="flex items-end justify-between rounded-lg border border-gray-200 bg-white dark:bg-gray-700 dark:border-gray-600 p-6"
                >
                  <div>
                    <p class="text-sm text-gray-500 dark:text-white">Customers</p>
                    <p class="text-2xl font-medium text-gray-900 dark:text-white">0</p>
                  </div>
                </article>
            </div>
            @endauth
        </div>
    </section>
</div>
