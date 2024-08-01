<x-app-layout>
    <form action="{{ route('like.store') }}" method="post">
        @csrf

        <input type="hidden" name="PostID" value="{{ $post->PostID }}">

        <div class="post-opt-hover">
            <button type="submit" class="post-option-btn-img object-cover">
                <img src="{{ asset('images/thumbs-up_2186301.png') }}" alt="thumb">
            </button>
        </div>

    </form>


</x-app-layout>
