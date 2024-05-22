<div>
    @foreach ($this->posts as $post)
    <marquee behavior="scroll" direction="left" scrollamount="10" id="runningText" class="mb-4 p-4 flex-row  bg-white rounded-lg ">
       <div class=" flex">
            <p class="text-gray-600 dark:text-gray-200">{{$post->content}}</p>
       </div>
    </marquee>
@endforeach
</div>
