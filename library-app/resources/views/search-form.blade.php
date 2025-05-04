<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <form class="navbar-form navbar-left" method="GET" action="{{url('search-form')}}">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="input-group">
                    <div>
                        <x-input-label for="search" :value="__('Search')" />
                        <x-text-input id="search" class="block mt-1 w-full" type="text" search="search" :value="old('search')" />
                    </div>
                    <x-primary-button class="ms-4">
                        {{ __('Search') }}
                    </x-primary-button>
                </div>
            </div>
        </div>    
     </form>
</x-app-layout>      
      