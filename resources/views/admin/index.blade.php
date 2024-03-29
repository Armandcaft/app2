<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All') }} {{ Auth::user()->name }}@if(substr(Auth::user()->name, -1) === 's')'@else's @endif {{ __('Articles') }}
        </h2>
        <div class="text-center text-green-400">
            <a href="{{ env('USERSTACK_URL') }}" class="hover:text-orange-300"> Get my info </a>
            |
            <a href="{{ url('/telescope') }}" class="hover:text-purple-600"> Monitor My Application </a>
        </div>
        <div class="text-center text-yellow-300">
            <a href="{{ url('/send-mail') }}" class="hover:text-green-600"> Testing Mailing Application </a>
        </div>
< reserved for Flash messages (for email messaging test 👀) >
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

        <br>
        {{ $mytime = Carbon\Carbon::now()->format('H:i:s d-m-Y') }}
        <br>
        {{ $ip = request()->ip(); }}
        <br>
        &nbsp;{{ucwords($mytime)}} &nbsp;{{ucwords(request()->ip())}} <br>
        <div style="float:left;">{{ucwords(request()->ip())}}</div>
        <br>

        {{-- <div class="container">
            <h1>Export Data to Excel File</h1>
            <br>
            <div class="form-group">
                <a href="{{ url('/') }}/export/xlsx" class="btn btn-success">Export to .xlsx</a>
                <a href="{{ url('/') }}/export/xls" class="btn btn-primary">Export to .xls</a>
            </div>
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Excerpt</th>
                        <th>Body</th>
                        <th>Image path</th>
                        <th>Min to read</th>
                        <th>User that published</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $empDetails)
                    <tr>
                        <td>{{ $empDetails->id }}</td>
                        <td>{{ $empDetails->title }}</td>
                        <td>{{ $empDetails->excerpt }}</td>
                        <td>{{ $empDetails->body }}</td>
                        <td>{{ $empDetails->image_path }}</td>
                        <td>{{ $empDetails->min_to_read }}</td>
                        <td>{{ $user->(empDetails->userid) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div> --}}

    <div class="bg-gray-100">
        <div class="w-4/5 mx-auto">
            <nav class="text-center mt-3 mb-5">
                <h1 class="text-3xl text-gray-700">
                    @if (Auth::user())
                    <nav class="">
                        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-2 px-2 shadow-xl rounded-full transition-all hover:bg-green-400"
                        href="{{ route('blog.create') }}">
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

    @foreach ($posts as $post)
        <div class="w-4/5 mx-auto pb-10">
            <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                <div class="w-11/12 mx-auto pb-10">
                    <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                        <a href="{{ route('blog.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="pt-4 italic">
                        Categories:
                        @foreach ($post->categories as $category)
                            {{ $category->title }}
                        @endforeach
                    </p>

                    <p class="text-gray-900 text-lg py-8 w-full break-words">
                        {{ $post->excerpt }}
                    </p>

                    <span class="text-gray-500 text-sm sm:text-base">
                    Made by:
                        <a href=""
                           class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                            {{ $post->user->name }}
                        </a>
                    updated at {{ $post->updated_at->format('d-m-y h:m:s') }}
                </span>

                <a href="{{ route('blog.edit', ['id'=>$post->id]) }}" class="block italic text-green-500 border-b-1 border-green-400 ">
                    Edit
                </a>

                <nav>
                    <div class="flex">
                        <form action="{{ route('blog.destroy', ['id'=>$post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="pt-3 text-red-500 pr-3" type="submit">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('affect_category', ['post_id'=>$post->id]) }}" class="block italic align-right text-blue-500 border-b-1 border-green-400 ml-auto">
                            Affect Category
                        </a>
                    </div>
                </nav>

                </div>
            </div>
        </div>
    @endforeach

    <div >
        {{ $posts->links() }}
    </div>
</x-app-layout>
