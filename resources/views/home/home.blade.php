<x-app-layout>
    <div class="first-page grid gap-10" style="grid-template-columns: 1fr 2fr 1fr;">

        @include('layouts.sidebar')

        <section class="home-wrapper">

            {{-- story  --}}
            <div class="flex gap-4 p-4" style="overflow: auto;">
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
                
                {{-- posts --}}
                @include('post.index')
                
                

            </div>

        </section>

        <section class="right-wrapper position-sticky">
            <div class="profile-box p-4">

                <div class="flex gap-2 items-center justify-between">
                    <a href="{{ route('profile.edit') }}">
                        <div class="hover:bg-gray-100 rounded-lg p-2 flex gap-2 items-center">

                            <img class="user-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">

                            <div>
                                <p class="email"><strong>{{ Auth::user()->email }}</strong></p>
                                <p class="fullname">{{ Auth::user()->name }}</p>
                            </div>

                        </div>
                    </a>

                    <div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            this.closest('form').submit();"
                                class="text-sm text-blue hover-underline">{{ __('Log Out') }}</a>
                        </form>
                    </div>

                </div>

            </div>

            <hr>


            <h1 class="p-4 font-semibold text-gray-900 text-xl">Contacts</h1>

            <div class="friends">

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

        </section>

    </div>
</x-app-layout>
