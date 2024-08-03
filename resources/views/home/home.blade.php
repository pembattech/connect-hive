<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">
        @include('layouts.sidebar')

        <section class="home-wrapper">

            {{-- story  --}}
            <div class="flex gap-4 p-4">
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

            </div>

            <div class="mid-content">

                {{-- upload post --}}
                @include('post.create')

                @include('post.post_img')

                {{-- posts --}}
                @include('post.index')



            </div>

        </section>

        <section class="right-wrapper position-sticky top-0 bg-white">
            <div class="flex flex-col" style="height: 100vh;">

                <div class="p-2" style="flex-shrink: 0;">
                    <div class="flex items-center justify-between">

                        <h1 class="p-4 font-semibold text-gray-900 text-xl">Groups</h1>


                        {{-- search group --}}
                        <div class="w-1/2">
                            <input type="text"
                                class="w-full px-4 pl-10 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Search groups...">
                        </div>

                    </div>

                    {{-- create group btn --}}
                    <button
                        class="mt-2 mb-2 alice-blue flex items-center gap-2 text-blue font-medium text-lg py-2 rounded-lg w-full justify-center">
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
                <div class="flex justify-between items-center">
                    <h1 class="p-4 font-semibold text-gray-900 text-lg">Groups you've joined</h1>

                    <a href="#" class="text-sm text-blue hover-underline">See all</a>
                </div>

                <div class="p-2" style="flex-shrink: 0.5; overflow: auto;">

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


                <h1 class="font-semibold text-gray-900 text-xl" style="padding-bottom: 1rem;">Contacts</h1>

                <div class="friends">


                    <div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>

                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>


                        <div class="flex gap-2 items-center p-2 rounded-lg hover:bg-gray-100">
                            <img class="friend-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            <p class="post-user">Pemba Tamang</p>
                        </div>
                    </div>

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
