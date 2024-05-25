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

    /* modal */
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        padding-top: 100px; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        display: flex;
        flex-direction: column;
    }

    /* The Close Button */
    .close {
        float: right;
        font-size: 28px;
        font-weight: bold;
        
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }

    .sup{
        background-color: #d32929;
        padding: 0.7rem;
        border-radius: 0.5rem;
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
                    <div class="mb-6 mt-3 flex ">
                        <div class="flex justify-between w-full">
                            <a href="{{ route('posts.create') }}" class="p-5 btn-create btn">Buat Pengumuman</a>
                            <button class="sup" id="btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg></button>
                        </div>
                        {{-- isi modal  --}}
                        <div class="modal" id="modal">
                            <div class="modal-content">
                                <span class="close"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>
                                <h1 class="text-2xl font-bold text-gray-700">Petunjuk penggunaan</h1>
                                <ol>
                                    <li>Langkah 1: Isi pengumuman yang ingin ditambahkan.</li>
                                    <li>Langkah 2: Klik tombol "Simpan" untuk menyimpan konten.</li>
                                    <li>Langkah 3: Gunakan tombol "ubah" untuk mengubah konten yang ada.</li>
                                    <li>Langkah 4: Gunakan tombol "Hapus" untuk menghapus konten yang ada.</li>
                                    <li>Langkah 5: Gunakan tombol "Tidak" untuk menyembunyikan konten dari tampilan publik.</li>
                                </ol>
                            </div>
                        </div>
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

<script>
    // Get the modal
    var modal = document.getElementById("modal");

    // Get the button that opens the modal
    var btn = document.getElementById("btn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
         modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
