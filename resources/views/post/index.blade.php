<x-app-layout>

    {{-- <pre>{{ var_export($likedPosts, true) }}</pre> --}}

    @foreach ($posts as $post)
        <div class="post-section mt-6">
            <div class="post mb-6">

                <div class="post-top-bar p-2 top-0 w-full text-black items-center">

                    <div class="flex gap-2 items-center">
                        <img class="user-small-pp-img object-cover rounded-full"
                            src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        <p class="post-user"><strong>{{ $post['user']['name'] }}</strong></p>
                    </div>

                    <div>
                        <img class="three-dot object-cover" src="{{ asset('images/more.png') }}" alt="more">
                    </div>

                </div>

                @if ($post['ImageURL'])
                    <div class="post-img-wrapper">

                        <div class="post-caption">
                            <p id="caption">{{ $post['Content'] }}</p>
                        </div>

                        <img class="post-image object-cover w-full"
                            src="{{ asset('post_images/' . $post['ImageURL']) }}" alt="post">
                    </div>
                @else
                    <div class="post-caption">
                        <p id="caption">{{ $post['Content'] }}</p>
                    </div>
                @endif

                <div class="post-option-btns p-2 flex justify-between items-center">

                    <div class="flex gap-4">

                        @include('like.like_create')

                        <div class="post-opt-hover">
                            <img class="post-option-btn-img object-cover"
                                src="{{ asset('images/chatting_2186364.png') }}" alt="comment">
                        </div>
                    </div>

                    <div class="post-opt-hover">
                        <img class="post-option-btn-img object-cover" src="{{ asset('images/share_2186322.png') }}"
                            alt="share">
                    </div>

                </div>

                @if (in_array($post['PostID'], $likedPosts))
                    <span>Liked</span>
                @else
                    <span>Not Liked</span>
                @endif

                <p>
                    if liked gareko mancha friend cha vaney otherwise display `1000 likes`
                </p>

                <div class="post-bottom">

                    <div class="liked-by-imgs flex gap-2 relative">

                        <div class="first--liked-by-pp-img">
                            <img class="object-cover rounded-full absolute"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        </div>

                        <div class="sec--liked-by-pp-img">
                            <img class="object-cover rounded-full absolute"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        </div>

                        <div class="third--liked-by-pp-img">
                            <img class="object-cover rounded-full absolute"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        </div>

                        <p class="mb-2 text-sm" style="margin-left: 20px;">
                            liked by <strong>@username</strong> and <strong>others</strong>
                        </p>
                    </div>

                    <div class="post-comment">
                        <p class="view-post-comment text-sm text-gray-700">
                            View all 11 comment
                        </p>

                        <input type="text" class="add-comment w-full text-sm text-gray-700"
                            placeholder="Add a comment...">

                    </div>

                </div>

            </div>

        </div>
    @endforeach
</x-app-layout>
