<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-20">
            <h1 class="text-3xl text-gray-700">
                Edit: Category n°{{ $category->id }} : {{ $category->title }}
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>

    <div class="m-auto pt-20">
        <div class="pb-8">
            @if ($errors->any())
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went wrong...
                </div>
                <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>
                            $error
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form class="form-control"
            action="{{ route('category.update', $category->id) }}"
            method="post">

            @csrf
            @method('PATCH') {{-- This helps convert the POST method to PATCH since HTML doesn't have. --}}

            <input
                type="text"
                name="title"
                value="{{ $category->title }}"
                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none form-input">

            <button
                type="submit"
                class="button uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Update Category
            </button>
        </form>
    </div>
</x-app-layout>
