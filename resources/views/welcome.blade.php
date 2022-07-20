<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css" type="text/css" />

    <title>Money App</title>
</head>

<body class="antialiased">
    <div class="relative bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6">
            <div class="flex items-center justify-between py-6 md:justify-start md:space-x-10">
                <div class="flex flex-1 w-0">
                    <a href="#" class="inline-flex">
                        <h2 class="text-xl font-bold">Money App</h2>
                    </a>
                </div>
                <div class="-my-2 -mr-2 md:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                        <!-- Heroicon name: menu -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <nav class="hidden space-x-10 md:flex">
                    <a href="#"
                        class="inline-flex items-center space-x-2 text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        Solutions
                    </a>
                    <a href="#"
                        class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        Pricing
                    </a>
                    <a href="#"
                        class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        Docs
                    </a>
                    <a href="#"
                        class="inline-flex items-center space-x-2 text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">
                        More
                    </a>
                </nav>
                <div class="items-center justify-end hidden space-x-8 md:flex md:flex-1 lg:w-0">
                    <a href="/login"
                        class="text-base font-medium leading-6 text-gray-500 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                        Sign in
                    </a>
                    <span class="inline-flex rounded-md shadow-sm">
                        <a href="/register"
                            class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                            Register
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="flex flex-col max-w-screen-md p-10 mx-auto text-center bg-white rounded-lg">
            <h1 class="mt-5 font-sans text-4xl font-black">Money App</h1>
            <h2 class="font-sans text-base font-bold text-gray-400">Visualize your money, <span
                    class="font-sans text-base font-bold text-blue-600">design your budgets</span>, <span
                    class="italic text-black">own your data</span>.</h2>
        </div>
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6">
            <img class="relative rounded-lg shadow-lg"
                src="https://tailwindui.com/img/component-images/top-nav-with-multi-column-layout-screenshot.png"
                alt="App screenshot">
        </div>

        <div class="py-12 bg-white">
            <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <p class="text-base font-semibold leading-6 tracking-wide text-blue-600 uppercase">Transactions</p>
                    <h3
                        class="mt-2 text-3xl font-extrabold leading-8 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                        A better way to take care of your money
                    </h3>
                    <p class="max-w-2xl mt-4 text-xl leading-7 text-gray-500 lg:mx-auto">
                        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate
                        veritatis in accusamus quisquam.
                    </p>
                </div>

                <div class="mt-10">
                    <ul class="md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <li>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-md">
                                        <!-- Heroicon name: globe-alt -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium leading-6 text-gray-900">Competitive exchange rates
                                    </h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-md">
                                        <!-- Heroicon name: scale -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium leading-6 text-gray-900">No hidden fees</h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-md">
                                        <!-- Heroicon name: lightning-bolt -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium leading-6 text-gray-900">Transfers are instant</h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-md">
                                        <!-- Heroicon name: annotation -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium leading-6 text-gray-900">Mobile notifications</h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
