<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>

    @if ($post->meta !== null)
    {{-- <?php dd($post) ?> --}}
        <meta
        name="description"
        content="{{ ($post->meta->meta_description == null) ? '' : ($post->meta->meta_description) }}"
        />
        <meta
        name="keywords"
        content="{{ $post->meta->meta_keywords ? $post->meta->meta_keywords : '' }}"
        />
        <meta
            name="robots"
            content="{{ $post->meta->meta_robots ? $post->meta->meta_robots : '' }}"
        />
    @else
        {{-- <?php dd($post) ?> --}}
        <meta
        name="description"
        content="No description"
        />
        <meta
        name="keywords"
        content="No keyword"
        />
        <meta
        name="robot"
        content="No robot"
        />
    @endif
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="pt-4">
                <a href="{{ URL::previous() }}"
                   class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                    < Back to previous page
                </a>
                {{-- <a href="{{ URL::previous() }}"
                   class="text-green-500 ml-auto italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20 text-end">
                    > Go to next page
                </a> --}}
            </div>
            <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article n°') }} {{ $post->id }}
            </h2>
        </x-slot>
    <div class="w-4/5 mx-auto">

        <h4 class="text-left underline-offset sm:text-center font-mono text-gray-900 py-3 mt-5">
            {{ __('Title') }}
        </h4>
        <h4 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-1 sm:py-1">
            {{ $post->title }}
        </h4>

        <p class="pt-4 italic">
            Categories:
            @foreach ($post->categories as $category)
                {{ $category->title }}
            @endforeach
        </p>
        {{-- {{ dd($post->meta) }} --}}

        <div class="block lg:flex flex-row">
            <div class="basis-9/12 text-center sm:block sm:text-left">
                <span class="text-left sm:text-center sm:text-left sm:inline block text-gray-900 pb-10 sm:pt-0 pt-0 sm:pt-10 pl-0 -mt-8 sm:-mt-0">
                    Made by:
                    <a
                        href=""
                        class="font-bold text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                        Code With Stormeur
                    </a> On
                    {{ $post->created_at->format('d-m-y h:m:s') }}
                    updated at
                    {{ $post->updated_at->format('d-m-y h:m:s') }}
                </span>
            </div>
        </div>

        <div class="pt-10 pb-10 text-gray-900 text-xl">
            <p class="font-bold text-2xl text-black pt-10">
                {{ $post->excerpt }}
            </p>

            <p class="text-base text-black pt-10">
                {{ $post->body }}
            </p>
        </div>
    </div>
    </body>
</x-app-layout>
</html>
