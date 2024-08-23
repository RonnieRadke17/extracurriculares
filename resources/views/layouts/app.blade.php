<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @yield('head')
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100 text-gray-900 antialiased leading-relaxed">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-start">
                    <a href="{{ route('home') }}" class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Workflow">
                    </a>
                    <div class="ml-6 flex space-x-4">
                        <a href="{{ route('home') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Deportes</a>
                        <!-- Additional Navigation Links can be added here -->
                    </div>
                </div>
                <div class="relative flex items-center space-x-4">
                    @auth
                        <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile picture">
                        </button>
                        <!-- Cart Icon and Summary -->
                    <div class="relative">
                        <!-- Ícono del carrito -->
                        <a href="#" id="cart-icon" class="relative text-gray-700 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L6 7h12l-1 6M7 13l1.5 6H16l1.5-6M5 21h14a2 2 0 002-2v-1H3v1a2 2 0 002 2z"/>
                            </svg>
                            <!-- Indicador de cantidad de productos en el carrito -->
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-500 rounded-full">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                        </a>

                        <!-- Resumen del carrito (popup) -->
                        <div id="cart-summary" class="absolute right-0 mt-2 w-64 bg-white border rounded-lg shadow-lg p-4 hidden">
                            @if(session('cart'))
                                <ul>
                                    @foreach(session('cart') as $item)
                                        <li class="flex justify-between mb-2">
                                            <span>{{ $item['name'] }}</span>
                                            <span>${{ $item['price'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('cart.checkout') }}" class="bg-blue-500 text-white px-4 py-2 rounded block text-center mt-4">
                                    Ir al Checkout
                                </a>
                            @else
                                <p class="text-gray-700">Tu carrito está vacío.</p>
                            @endif
                        </div>
                    </div>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Lateral Menu -->
    <div id="lateral-menu-overlay" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 z-50"></div>
    <div id="lateral-menu" class="hidden fixed inset-y-0 right-0 w-64 bg-white shadow-lg z-50 transition-transform transform translate-x-full">
        <div class="py-4 px-6">
            <!-- Profile Section -->
            <div class="w-full bg-gray-100 p-4 rounded-lg flex flex-col items-center">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile picture">
                <span class="mt-2 font-bold">Persona</span>
            </div>
            <!-- Menu Items -->
            <nav class="mt-4 border-t border-gray-200 pt-4 space-y-1">
                <a href="#" class="text-gray-700 hover:bg-gray-200 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Team</a>
                <a href="#" class="text-gray-700 hover:bg-gray-200 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Projects</a>
                <a href="#" class="text-gray-700 hover:bg-gray-200 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
                <a href="{{ route('logout') }}" class="text-gray-700 hover:bg-gray-200 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Salir</a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main class="py-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Logo and Slogan -->
            <div class="mb-6 md:mb-0 text-center md:text-left">
                <h2 class="text-2xl font-bold">Pasteleria Santa Barbara Dulce Sabor</h2>
                <p class="text-gray-400">Endulzando tus momentos especiales desde 1998</p>
            </div>

            <!-- Contact Information -->
            <div class="text-center md:text-right">
                <p class="text-sm">📞 Teléfono: <a href="tel:+123456789" class="text-gray-300 hover:text-white">+1 (234) 567-890</a></p>
                <p class="text-sm">📧 Email: <a href="mailto:info@dulcesabor.com" class="text-gray-300 hover:text-white">info@dulcesabor.com</a></p>
                <p class="text-sm">📍 Dirección: 123 Calle Pastel, Ciudad Dulce, PA 12345</p>
            </div>
        </div>
        
        <!-- Social Media Links -->
        <div class="mt-6 flex justify-center md:justify-end space-x-4">
            <a href="#" class="text-gray-400 hover:text-white">
                <span class="sr-only">Facebook</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.019 3.674 9.167 8.438 9.878v-6.987h-2.54v-2.89h2.54v-2.196c0-2.507 1.492-3.89 3.773-3.89 1.093 0 2.238.195 2.238.195v2.465h-1.26c-1.243 0-1.63.772-1.63 1.563v1.863h2.773l-.443 2.89h-2.33v6.987C18.326 21.167 22 17.02 22 12z"/>
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.061 2.633.331 3.637 1.336 1.004 1.004 1.274 2.271 1.335 3.637.059 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.061 1.366-.331 2.633-1.336 3.637-1.004 1.004-2.271 1.274-3.637 1.335-1.265.059-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.061-2.633-.331-3.637-1.336-1.004-1.004-1.274-2.271-1.335-3.637-.059-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.061-1.366.331-2.633 1.336-3.637 1.004-1.004 2.271-1.274 3.637-1.335 1.265-.059 1.645-.07 4.849-.07zm0-2.163C8.736 0 8.332.011 7.052.071 5.737.131 4.448.462 3.403 1.507 2.358 2.552 2.028 3.841 1.968 5.156.909 8.24.909 11.76.909 14.844c0 3.084 0 6.604.07 7.918.06 1.315.39 2.604 1.435 3.649 1.045 1.045 2.334 1.376 3.649 1.436 1.314.059 1.719.07 4.947.07s3.633-.011 4.947-.07c1.315-.06 2.604-.391 3.649-1.436 1.045-1.045 1.376-2.334 1.436-3.649.059-1.314.07-1.719.07-4.947s-.011-3.633-.07-4.947c-.06-1.315-.391-2.604-1.436-3.649-1.045-1.045-2.334-1.376-3.649-1.436-1.314-.059-1.719-.07-4.947-.07S8.633.011 7.319.071C6.004.131 4.715.462 3.67 1.507 2.625 2.552 2.295 3.841 2.235 5.156c-.06 1.314-.07 1.719-.07 4.947s.011 3.633.07 4.947c.06 1.315.39 2.604 1.435 3.649 1.045 1.045 2.334 1.376 3.649 1.436 1.314.059 1.719.07 4.947.07s3.633-.011 4.947-.07c1.315-.06 2.604-.391 3.649-1.436 1.045-1.045 1.376-2.334 1.436-3.649.059-1.314.07-1.719.07-4.947s-.011-3.633-.07-4.947c-.06-1.315-.391-2.604-1.436-3.649C19.25 2.52 17.961 2.189 16.647 2.129 15.332 2.069 14.928 2.058 12 2.058c-2.927 0-3.331.011-4.645.071-1.314.06-2.603.391-3.648 1.436-1.045 1.045-1.376 2.334-1.436 3.648C2.07 8.333 2.059 8.737 2.059 12c0 3.263.011 3.667.071 4.981.06 1.314.391 2.603 1.436 3.648 1.045 1.045 2.334 1.376 3.648 1.436 1.314.06 1.718.071 4.981.071s3.667-.011 4.981-.071c1.314-.06 2.603-.391 3.648-1.436 1.045-1.045 1.376-2.334 1.436-3.648.059-1.314.071-1.718.071-4.981 0-2.263-.012-2.667-.071-3.981-.06-1.314-.391-2.603-1.436-3.648-1.045-1.045-2.334-1.376-3.648-1.436-1.314-.06-1.719-.071-4.981-.071s-3.667.011-4.981.071c-1.314.06-2.603.391-3.648 1.436-1.045 1.045-1.376 2.334-1.436 3.648-.059 1.314-.071 1.718-.071 4.981z"/>
                    <path fill-rule="evenodd" d="M12 5.838c-3.4 0-6.162 2.762-6.162 6.162 0 3.4 2.762 6.162 6.162 6.162s6.162-2.762 6.162-6.162c0-3.4-2.762-6.162-6.162-6.162zm0 1.837a4.325 4.325 0 100 8.65 4.325 4.325 0 000-8.65zm6.406-1.075a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <span class="sr-only">Twitter</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.155 11.675-11.497 0-.175 0-.349-.012-.522A8.23 8.23 0 0022 5.92a8.19 8.19 0 01-2.357.639 4.1 4.1 0 001.804-2.27 8.224 8.224 0 01-2.605.986 4.092 4.092 0 00-6.993 3.727 11.605 11.605 0 01-8.436-4.264 4.007 4.007 0 001.27 5.454A4.094 4.094 0 012.8 9.71v.051a4.092 4.092 0 003.28 4.014 4.093 4.093 0 01-1.85.07 4.094 4.094 0 003.825 2.85A8.233 8.233 0 012 18.406a11.616 11.616 0 006.29 1.84"/>
                </svg>
            </a>
        </div>
    </div>
</footer>


    @vite('resources/js/app.js')
</body>
</html>
