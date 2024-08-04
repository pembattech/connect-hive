<div class="popup-modal" id = "post-popup">

    <div class="popup-content bg-white border rounded-lg" style="width: fit-content; height: auto;">

        <div id="cancelButton" class="absolute top-0">

            <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                width="24px" fill="#e8eaed">
                <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>

        </div>

        <div class="flex gap-4 justify-center items-center ">

            <div class="post mb-6">

                {{-- <div style="display: none;" id="postid"></div> --}}

                <div class="gap-4 justify-center" style="display: grid; grid-template-columns: 1fr 1fr;">

                    <div class="popup-post-body">

                        {{-- AUTO GENERATE BY AJAX --}}
                        {{-- @if ($post['ImageURL'])
                                <div class="post-img-wrapper">

                                    <div class="post-caption">
                                        <p id="caption"></p>
                                    </div>

                                    <img class="post-image object-cover w-full" src="" alt="post">

                                </div>
                            @else
                                <div class="post-caption">
                                    <p id="caption"></p>
                                </div>
                            @endif --}}

                    </div>

                    <div>

                        <div class="post-top-bar p-2 text-black items-center">

                            <div class="flex gap-2 items-center">
                                <img class="user-small-pp-img object-cover rounded-full"
                                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                                <p><strong class="post-user-popup"></strong> • <span id="created_at_popup"></span></p>
                            </div>

                            <div>
                                <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                    <path
                                        d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z" />
                                </svg>

                            </div>

                        </div>


                        <div class="post-option-btns p-2 flex justify-between items-center">

                            <div class="flex gap-4">

                                @include('like.like_create')


                                <div class="post-opt-hover">

                                    <svg class="asset-btn-svg" data-post-id="{{ $post['PostID'] }}"
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-240v-640h800v800L720-240H80Zm80-80h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                                    </svg>

                                </div>

                            </div>

                            <div class="post-opt-hover">
                                <img class="post-option-btn-img object-cover"
                                    src="{{ asset('images/share_2186322.png') }}" alt="share">
                            </div>

                        </div>

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

                            </div>

                        </div>
                        @include('comment.comment_create')

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
