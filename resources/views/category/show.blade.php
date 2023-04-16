<x-app-layout>
    <x-slot name="header">
        <div class="pt-4">
            <a href="{{ URL::previous() }}"
                class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page </a>
                    {{-- <a href="{{ URL::previous() }}"
                   class="text-green-500 ml-auto italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20 text-end">
                    > Go to next page
                </a> --}}
        </div>
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category n°') }} {{ $category->id }}
        </h2>
    </x-slot>
    <div class="w-4/5 mx-auto">

        <h4 class="text-left underline-offset sm:text-center font-mono text-gray-900 py-3 mt-5">
            {{ __('Title') }}
        </h4>
        <h4 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-1 sm:py-1">
            {{ $category->title }}
        </h4>

        <p class="pt-4 italic">
            Categories:
            {{ $category->title }}
        </p>
    </div>
</x-app-layout>
