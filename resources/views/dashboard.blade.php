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
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200">
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary p-3 bg-purple-400 rounded-md">Create New Post</a>
                                    <table class="table-auto w-full">
                                        <thead>
                                            <tr>

                                                <th>Content</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                            <tr>
                            
                                                <td>{{ $post->content }}</td>
                                                <td>
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
