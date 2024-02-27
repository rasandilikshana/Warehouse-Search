<nav class=" border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">M I S</span>
        </a>
        <div class="flex md:order-2">
            @auth <!-- Check if the user is authenticated -->
                <a class="relative bg-transparent px-5 py-2.5 hover:from-cyan-500 hover:to-blue-500 border-2 border-transparent text-white hover:text-center rounded-lg group" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="relative text-transparent font-semibold bg-clip-text bg-gradient-to-r to-blue-500 from-cyan-500 hover:text-white group-hover-bg-opacity-0">
                        {{ auth()->user()->name }}
                        <br>
                        <small>{{ auth()->user()->level }}</small>
                    </span>
                    {{-- <img class="img-profile rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg"> --}}
                </a>
                <a class="relative bg-transparent px-5 py-2.5 hover:from-cyan-500 hover:to-blue-500 border-2 border-transparent text-white hover:text-center rounded-lg group" href="{{ route('logout') }}">
                    <i class="relative text-transparent font-semibold bg-clip-text bg-gradient-to-r to-blue-500 from-cyan-500 hover:text-white group-hover-bg-opacity-0"></i>
                    Logout
                </a>
            @else
                <a href="login"
                    class="relative bg-transparent px-5 py-2.5 hover:from-cyan-500 hover:to-blue-500 border-2 border-transparent text-white hover:text-center rounded-lg group">
                    <span class="relative text-transparent font-semibold bg-clip-text bg-gradient-to-r to-blue-500 from-cyan-500 hover:text-white group-hover-bg-opacity-0">Log In</span>
                </a>
            @endauth
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 ">
                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 bg-transparent text-cyan-500 rounded md:bg-transparent md:text-cyan-500 md:p-0 "
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-cyan-500 md:hover:bg-transparent md:hover:text-cyan-500 md:p-0 ">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-cyan-500 md:hover:bg-transparent md:hover:text-cyan-500 md:p-0 ">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-cyan-500 md:hover:bg-transparent md:hover:text-cyan-500 md:p-0 ">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
