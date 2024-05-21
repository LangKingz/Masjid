<div>
    @foreach ($this->posts as $post)
        <div class="mb-4 p-4 bg-white rounded-lg shadow-md">
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
</div>