<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{$description ?? ''}}">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link href="{{asset('assets/css/argon-dashboard-tailwind.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/tooltips.css')}}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <title>{{$title ?? ''}}</title>
</head>
<body
    class="m-0 font-sans text-base antialiased font-normal bg-slate-900 leading-default bg-gray-50 text-slate-500">
<div class="absolute w-full bg-blue-500 hidden min-h-75"></div>

<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl shadow-none bg-slate-850 xl:ml-6 max-w-64 ease-nav-brand z-990 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-white text-slate-700"
           href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <span
                class="ml-1 font-semibold transition-all duration-200 ease-nav-brand text-3xl underline">CVTeque</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent bg-gradient-to-r from-transparent via-white to-transparent"/>

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

            {{--            <li class="mt-0.5 w-full">--}}
            {{--                <a class="py-2.7 {{$menuactive == 1 ? 'bg-blue-500/13 font-semibold' : ''}} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors text-white opacity-80"--}}
            {{--                   href="pages/dashboard.html">--}}
            {{--                    <div--}}
            {{--                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">--}}
            {{--                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>--}}
            {{--                    </div>--}}
            {{--                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            @if(!isset($menuactive))
                {{ $menuactive = 0 }}
            @endif

            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{$menuactive == 2 ? 'bg-blue-500/13 font-semibold' : ''}} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors text-white opacity-80"
                   href="{{route('competences.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Compétences</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{$menuactive == 3 ? 'bg-blue-500/13 font-semibold' : ''}} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors text-white opacity-80"
                   href="{{route('metiers.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Métiers</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{$menuactive == 4 ? 'bg-blue-500/13 font-semibold' : ''}} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors text-white opacity-80"
                   href="{{route('professionnels.index')}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Professionnels</span>
                </a>
            </li>

            {{--            <li class="w-full mt-4">--}}
            {{--                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase text-white opacity-60">Account--}}
            {{--                    pages</h6>--}}
            {{--            </li>--}}
            <hr>
            <form action="{{route('professionnels.search')}}" method="post"
                  class="mt-0.5 w-full flex flex-col items-center justify-center gap-4">
                @csrf
                @method('POST')
                <label class="text-white">Rechercher un professionnel</label>
                <input type="text" placeholder="Nom / Prénom" name="search">
            </form>
            <hr>

            {{--            <li class="mt-0.5 w-full">--}}
            {{--                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors text-white opacity-80"--}}
            {{--                   href="pages/sign-in.html">--}}
            {{--                    <div--}}
            {{--                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">--}}
            {{--                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>--}}
            {{--                    </div>--}}
            {{--                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign In</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            {{--            <li class="mt-0.5 w-full">--}}
            {{--                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors text-white opacity-80"--}}
            {{--                   href="pages/sign-up.html">--}}
            {{--                    <div--}}
            {{--                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">--}}
            {{--                        <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>--}}
            {{--                    </div>--}}
            {{--                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Up</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </div>
</aside>

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->
        @yield('contenu')

        <!-- card 2 -->

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            Arthur SALOMON
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>
</body>
<!-- plugin for scrollbar  -->
<script src="{{asset('assets/js/perfect-scrollbar.min.js')}}" async></script>
<!-- main script file  -->
<script src="{{asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1')}}" async></script>
</html>
</html>
