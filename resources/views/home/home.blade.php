<x-app-layout>

    <section class="home-wrapper">

        {{-- story  --}}
        <div class="flex gap-4 p-4" style="overflow: auto;">
            <div class="relative">

                <img class="story-pp-img object-cover rounded-full" src="{{ asset('images/profile-images/profile.jpg') }}"
                    alt="pp">

                <div class="create-story-btn absolute rounded-full">

                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line x1="12" y1="5" x2="12" y2="19" stroke="#fff"
                            stroke-width="2" stroke-linecap="round" />
                        <line x1="5" y1="12" x2="19" y2="12" stroke="#fff"
                            stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
            <div>

                <img class="story-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
            </div>
            <div>

                <img class="story-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
            </div>
            <div>

                <img class="story-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
            </div>
            <div>

                <img class="story-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
            </div>
            <div>

                <img class="story-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
            </div>
            <div>

                <img class="story-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
            </div>

        </div>

        <div class="mid-content">

            {{-- upload post --}}
            <div class="create-post flex gap-4 mt-4 mb-4">
                <input type="text"
                    class="w-full px-4 pl-10 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    placeholder="What's on your mind, Pemba Tamang">

                <img class="other-asset-img" src="{{ asset('images/picture.png') }}" alt="upload picture">

            </div>


            {{-- posts --}}
            <div class="post-section mt-6">
                <div class="post mb-6">

                    <div class="relative">

                        <img class="post-image object-cover" src="{{ asset('images/profile-images/profile.jpg') }}"
                            alt="post">

                        <div class="post-top-bar p-2 top-0 w-full absolute text-white items-center">

                            <div class="flex gap-2 items-center">
                                <img class="user-small-pp-img object-cover rounded-full"
                                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                                <p class="post-title">Pemba Tamang</p>
                            </div>

                            <div>
                                <img class="three-dot object-cover" src="{{ asset('images/more.png') }}"
                                    alt="more">
                            </div>

                        </div>

                        <div class="post-option-btns p-2 flex justify-between items-center">

                            <div class="flex gap-4">
                                <div class="post-opt-hover">
                                    <img class="post-option-btn-img object-cover"
                                        src="{{ asset('images/thumbs-up_2186301.png') }}" alt="thumb">
                                </div>
                                <div class="post-opt-hover">
                                    <img class="post-option-btn-img object-cover"
                                        src="{{ asset('images/chatting_2186364.png') }}" alt="comment">
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

                    </div>

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


                        <div class="post-caption">

                            <p><strong>@username</strong> <span id="caption">Confidence in every click 📸</span></p>

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

        </div>

    </section>

    <section class="right-wrapper position-sticky">
        <div class="profile-box p-4">

            <div class="flex gap-2 items-center justify-between">
                <div class="hover:bg-gray-100 rounded-lg p-2 flex gap-2 items-center">

                    <img class="user-small-pp-img object-cover rounded-full"
                        src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">

                    <div>
                        <p class="username"><strong>pembatitung</strong></p>
                        <p class="fullname">Pemba Tamang</p>
                    </div>

                </div>

                <div>
                    <a href="#" class="text-sm text-blue hover-underline">Logout</a>
                </div>

            </div>

        </div>

        <hr>

        
        <h1 class="p-4 font-semibold text-gray-900 text-xl">Contacts</h1>

        <div class="friends">
        
            <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                <img class="friend-small-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                <p class="post-title">Pemba Tamang</p>
            </div>

            <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                <img class="friend-small-pp-img object-cover rounded-full"
                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                <p class="post-title">Pemba Tamang</p>
            </div>


        </div>

    </section>
</x-app-layout>
