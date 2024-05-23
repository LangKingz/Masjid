<style>
    .btn-create {
        background-color: #3490dc;

    }

    .btn {
        padding: 0.8rem;
        border-radius: 0.5rem;
        color: white
    }

    .btn-warning {
        background-color: #f6993f;
    
    }

    .btn-danger {
        background-color: #e3342f;
        padding: 0.6rem ;
        border-radius: 0.4rem;
        color: white
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

    .content {
        width: 100%;

    }

    .btn-list {
        /* background-color: #bfda23; */
        padding: 0.6rem ;
        border-radius: 0.4rem;
        color: white
    
    }


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900 ">
                    <div class="mb-6 mt-3">
                        <a href="{{ route('posts.create') }}" class="p-5 btn-create btn">Buat Pengumuman</a>
                        {{-- @livewire('create') --}}
                    </div>
                    <h1 class="text-2xl font-bold text-gray-700">Tempat Pengumuman</h1>
                    <div class="card p-3 mt-4  bg-white dark:bg-gray-200  text-gray-900">
                        <div class="card-body ">
                            
                            <div class="content flex justify-between flex-col">
                                @foreach ($posts as $post)
                                <div class="flex justify-between p-6 ">
                                    <div class=" ">
                                        <h1 class="text-xl font-bold text-gray-700">isi pengumuman :</h1>
                                        <p class="text-gray-600 dark:text-gray-900">{{$post->content}}</p>
                                        <p class="{{$post->is_history ? 'text-red-500 ' : 'text-green-500'}} mt-3">{{$post->is_history ? "tidak ditampilkan" : "sedang ditampilkan"}}</p>
                                        
                                        <p class="text-gray-500 text-sm">dibuat : {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
                                        <p class="text-gray-500 text-sm">di edit : {{ $post->updated_at->format('Y-m-d H:i:s') }}</p>
                                    </div>
                                    <div class="button">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Ubah</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn-danger">Hapus</button>
                                            </form>
                                            <form action="{{ route('posts.toggleHistory', $post->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class=" btn-list " style="background-color: {{$post->is_history ? '#2cd87a' : '#bfda23'}}">
                                                    {{$post->is_history ? 'Tampilkan' : 'Tidak '}}
                                                </button>
                                            </form>
                                            
                                        {{-- <a href="{{ route('posts.show',$post->id)}}" class="btn-list">Tidak Ditampilkan</a> --}}
                                    </div>
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
