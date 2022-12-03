<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }} {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
<!-- admin-layout from AdminLayout in app/View/Components -->
<!-- Alternatively, we could create a component and add in resources/ciews/components -->
