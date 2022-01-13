<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <style>
        body {
            background-color: #393E46;
        }

        h1 {
            color: #00ADB5;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <h1 class="text-center md:text-left px-6 text-xl">Homepage</h1>
                <div class="px-6 mt-4">
                    <p class="text-center md:text-left text-md text-green-700 text-md">Welcome {{Auth::user()->name}}!</p>
                </div>
                <div class="p-6 mt-6 grid grid-cols-1 md:grid-cols-2 gap-10 md:grid-60 text-gray-700 uppercase">
                    <a href="{{route('dashboard')}}">
                        <div class="bg-gray-200 hover:bg-gray-400 hover:text-gray-200 h-24 md:h-48 flex transition duration-500 ease-in-out transform hover:scale-110">
                            <p class="m-auto">Tasks</p>
                        </div>
                    </a>
                    <a href="{{route('profile.show')}}">
                        <div class="bg-gray-400 hover:bg-gray-200 text-gray-200 hover:text-gray-700 h-24 md:h-48 flex transition ease-in-out duration-500 transform hover:scale-110">
                            <p class="m-auto">Profile</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
