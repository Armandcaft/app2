<x-app-layout>
    <x-slot name="header">

        @if (session()->has('message'))
            <div class="mx-auto w-4/5 pb-10">
                <div class="bg-green-500 text-white font-bold px-4 py-2">
                    Success
                </div>
                <div class="border border-t-1 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="mx-auto w-4/5 pb-10">
                <div class="bg-red-500 text-white font-bold px-4 py-2">
                    Warning
                </div>
                <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

    </x-slot>
    <div class="bg-gray-100">
        <div class="w-4/5 mx-auto">
            <nav class="text-center mt-3 mb-5">
                <h1 class="text-3xl text-gray-700">
                    @if (Auth::user())
                    <nav class="">
                        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-2 px-2 shadow-xl rounded-full transition-all hover:bg-green-400"
                        href="{{ route('category.create') }}">
                           {{ __('New Article') }}
                        </a>
                    </nav>
                    @endif
                </h1>
            </nav>
            <hr class="border border-1 border-gray-300 ">
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mx-auto w-4/5 pb-10">
            <div class="bg-red-500 text-white font-bold px-4 py-2">
                Warning
            </div>
            <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif

    @foreach ($categories as $category)
        <div class="w-4/5 mx-auto pb-10">
            <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                <div class="w-11/12 mx-auto pb-10">
                    <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                        <a href="{{ route('category.show', $category->id) }}">
                            {{ $category->title }}
                        </a>
                    </h2>
                <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="block italic text-green-500 border-b-1 border-green-400 ">
                    Edit
                </a>

                <form action="{{ route('category.destroy', ['id'=>$category->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="pt-3 text-red-500 pr-3" type="submit">
                        Delete
                    </button>
                </form>

                </div>
            </div>
        </div>
    @endforeach

    <div >
        {{ $categories->links() }}
    </div>
</x-app-layout>
