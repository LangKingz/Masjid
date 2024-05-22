<style>
    .btn-create {
        background-color: #3490dc;

    }

    .btn {
        padding: 0.8rem;
        border-radius: 0.5rem;
    }

    .btn-warning {
        background-color: #f6993f;
    
    }

    .btn-danger {
        background-color: #e3342f;
        padding: 0.6rem ;
        border-radius: 0.4rem;
    }

    .card{
        border-radius: 0.5rem;
        padding: 1rem
        
    }

    .card-body{
        display: flex;
        flex-direction: column;
        color: #3490dc
        background-color: #e3342f
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <a href="{{ route('posts.create') }}" class="p-10 btn-create btn">Buat Pengumuman</a>
                    </div>

                    <div class="card p-3 mt-4  bg-white dark:bg-gray-700  dark:text-gray-100">
                        <div class="card-body w-1/2">
                            <h1 class="text-2xl font-bold text-gray-50">Pengumuman</h1>
                            <div class="content flex justify-between">
                                @foreach ($posts as $post)
                                <div class="mt-3 ">
                                    <p class="text-gray-600 dark:text-gray-200">{{$post->content}}</p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn-danger">Delete</button>
                                        </form>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
