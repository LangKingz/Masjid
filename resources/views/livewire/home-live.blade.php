<div>
    @foreach ($this->posts as $post)
        <marquee behavior="scroll" direction="left" scrollamount="10" id="runningText" class="mb-4 p-4 bg-white rounded-lg ">
            {{ $post->content }}
        </marquee>
    @endforeach
</div>