<div wire:poll.2s >
    @foreach ($this->posts as $post)
        <marquee behavior="scroll" direction="left" scrollamount="10" id="runningText" class="mb-4 p-4 flex-row flex bg-white rounded-lg ">
            <p class="text-gray-600 mx-3 dark:text-gray-200">{{$post->content}}</p>
        </marquee>
    @endforeach

</div>