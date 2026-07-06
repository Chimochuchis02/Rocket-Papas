<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700 sticky-top shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group text-decoration-none">
                        <img src="{{ asset('img/Rocke.png') }}" alt="Rocket Papas Logo"
                            class="h-10 w-10 object-contain rounded-full shadow-md transition-transform duration-200 group-hover:scale-105" />

                        <div class="flex flex-col justify-center">
                            <span class="text-white font-black text-lg tracking-wider leading-none uppercase font-sans">
                                Rocket Papas
                            </span>
                            <span
                                class="text-yellow-400 font-bold text-[9px] tracking-widest leading-none uppercase mt-1 font-sans">
                                Protegido para GANAR.
                            </span>
                        </div>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <div class="hidden sm:flex sm:items-center sm:ms-4">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-gray-100 focus:outline-none transition ease-in-out duration-150">
                                    <div>Productos</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('productos.index')">
                                    Ver Inventario
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('productos.create')">
                                    Agregar Producto
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-4">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-gray-100 focus:outline-none transition ease-in-out duration-150">
                                    <div>Carrouseles</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('carrouseles.index')">
                                    Ver Sliders
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('carrouseles.create')">
                                    Crear Nuevo
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-4">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-gray-100 focus:outline-none transition ease-in-out duration-150">
                                    <div>Banners</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('banners.index')">
                                    Ver Banners
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('banners.create')">
                                    Crear Nuevo
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-4">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-gray-100 focus:outline-none transition ease-in-out duration-150">
                                    <div>Menus</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('banners.index')">
                                    Ver Menus
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('banners.create')">
                                    Crear Nuevo
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-gray-100 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-gray-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <div class="border-t border-gray-700 my-2"></div>
            <span class="block px-4 py-1 text-xs font-semibold text-gray-400 uppercase">Productos</span>
            <x-responsive-nav-link :href="route('productos.index')">Ver Inventario</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('productos.create')">Agregar Producto</x-responsive-nav-link>

            <div class="border-t border-gray-700 my-2"></div>
            <span class="block px-4 py-1 text-xs font-semibold text-gray-400 uppercase">Carrouseles</span>
            <x-responsive-nav-link :href="route('carrouseles.index')">Ver Sliders</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('carrouseles.create')">Crear Nuevo</x-responsive-nav-link>

            <div class="border-t border-gray-700 my-2"></div>
            <span class="block px-4 py-1 text-xs font-semibold text-gray-400 uppercase">Banners</span>
            <x-responsive-nav-link :href="route('banners.index')">Ver banners</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('banners.create')">Crear Nuevo</x-responsive-nav-link>

            <div class="border-t border-gray-700 my-2"></div>
            <span class="block px-4 py-1 text-xs font-semibold text-gray-400 uppercase">Menus</span>
            <x-responsive-nav-link :href="route('banners.index')">Ver Menus</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('banners.create')">Crear Nuevo</x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>