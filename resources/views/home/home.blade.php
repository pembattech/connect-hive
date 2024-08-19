<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">
        @include('layouts.sidebar')

        <section class="home-wrapper">

            {{-- story  --}}
            {{-- <div class="flex gap-4 p-4">
                <div class="relative">

                    <img class="story-pp-img object-cover rounded-full"
                        src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">

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

            </div> --}}

            <div class="mid-content">

                {{-- upload post --}}
                @include('post.create')

                @include('post.post_img')

                @if (count($posts))
                    {{-- posts --}}
                    @include('post.index')
                @else
                    <p>No posts</p>
                @endif



            </div>

        </section>

        <section class="right-wrapper position-sticky top-0 bg-white">
            <div class="flex flex-col" style="height: 100vh;">

                <div class="p-4" style="flex-shrink: 0;">
                    <div class="flex items-center justify-between gap-4">

                        <h1 class="font-semibold text-gray-900 text-xl">Groups</h1>

                        <div>
                            <input type="text"
                                class="text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Search groups...">
                        </div>

                    </div>

                    {{-- create group btn --}}
                    <button
                        class="mt-4 alice-blue flex items-center gap-2 text-blue font-medium text-lg py-2 rounded-lg w-full justify-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19" stroke="#0000FF"
                                stroke-width="2" stroke-linecap="round" />
                            <line x1="5" y1="12" x2="19" y2="12" stroke="#0000FF"
                                stroke-width="2" stroke-linecap="round" />
                        </svg>

                        Create new group
                    </button>
                </div>

                {{-- list of groups --}}
                <div class="flex justify-between items-center p-4">
                    <h1 class="font-semibold text-gray-900 text-xl">Groups you've joined</h1>

                    <a href="#" class="text-sm text-blue hover-underline">See all</a>
                </div>

                <div class="p-2" style="flex-shrink: 5; overflow: auto;">

                    <div class="flex flex-col">
                        <div class="flex gap-2 items-center group rounded-lg p-2 hover:bg-gray-100">
                            <img class="group-pp-img object-cover rounded opacity-75"
                                src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
                            Group 1
                        </div>

                        <div class="flex gap-2 items-center group p-2 rounded-lg hover:bg-gray-100">
                            <img class="group-pp-img object-cover rounded opacity-75"
                                src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
                            Group 2
                        </div>

                        <div class="flex gap-2 items-center group p-2 rounded-lg hover:bg-gray-100">
                            <img class="group-pp-img object-cover rounded opacity-75"
                                src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
                            Group 2
                        </div>

                        <div class="flex gap-2 items-center group p-2 rounded-lg hover:bg-gray-100">
                            <img class="group-pp-img object-cover rounded opacity-75"
                                src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
                            Group 2
                        </div>

                        <div class="flex gap-2 items-center group p-2 rounded-lg hover:bg-gray-100">
                            <img class="group-pp-img object-cover rounded opacity-75"
                                src="{{ asset('images/group-images/group_img.jpg') }}" alt="setting">
                            Group 2
                        </div>
                    </div>

                </div>

                <div class="flex justify-between items-center p-4">

                    <h1 class="font-semibold text-gray-900 text-xl">Friends</h1>

                    <a href="{{ route('friendship.friends') }}" class="text-sm text-blue hover-underline block">See
                        all</a>

                </div>

                <div class="friends">

                    @foreach ($friendsDetails as $friendDetail)
                        <div class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-100">
                            <div class="flex gap-2 items-center">

                                    @if ($friendDetail['profile_picture'])
                                        <img class="friend-small-pp-img object-cover rounded-full"
                                            src="{{ asset('images/pp_images/' . $friendDetail['profile_picture']) }}"
                                            alt="pp">
                                    @else
                                        <svg class="friend-small-pp-img" xmlns="http://www.w3.org/2000/svg"
                                            height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                            <path
                                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                        </svg>
                                    @endif


                                <p class="post-user">{{ $friendDetail->name }}</p>

                            </div>

                            <div>
                                <a href="#"
                                    class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Message</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section>

    </div>



    <script>
        const showPopup_post_img = document.getElementById('post-img-btn');
        const hiddenDiv = document.getElementById('popup-modal');

        showPopup_post_img.addEventListener('click', () => {
            hiddenDiv.style.display = 'block';

        });

        const hidePopup = document.getElementById('cancel-button');
        hidePopup.addEventListener('click', () => {
            hiddenDiv.style.display = 'none';
        });
    </script>

</x-app-layout>
