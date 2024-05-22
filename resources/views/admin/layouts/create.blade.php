<style>
    .btn{
        padding: 0.8rem;
        border-radius: 0.5rem;
        background-color: #3490dc;
    }

    form{
        padding: 0.3rem;
        
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 dark:bg-gray-700   ">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="">
                            <p class="dark:text-gray-300">Pengumuman</p>
                        </div>
                        <div class="mt-4">
                            <x-label for="content" :value="__('Content')" />
                            <textarea id="content" class="block mt-1 w-full rounded-lg" name="content" required></textarea>
                        </div>
                        <div class="mt-4">
                            <x-button class="btn">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>