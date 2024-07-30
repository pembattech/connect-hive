<section class="sidebar-wrapper p-4 position-sticky">

    <div class="flex gap-4">
        <div class="connecthive-logo">
            <img class="user-small-pp-img object-cover rounded-full"
                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
        </div>

        <div style="width: 80%;">
            <input type="text"
                class="w-full text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                placeholder="Search">

        </div>

    </div>

    <nav class="mt-2 mb-2">

        <div class="flex flex-col">
            <div class="text-xl rounded-lg p-2 hover:bg-gray-100">
                <p>Home</p>
            </div>

            <div class="text-xl p-2 rounded-lg hover:bg-gray-100">
                <p>Notification</p>
            </div>

            <div class="text-xl p-2 rounded-lg hover:bg-gray-100">
                <p>Message</p>
            </div>
        </div>

    </nav>


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

</section>
