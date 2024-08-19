<section class="sidebar-wrapper position-sticky top-0 bg-white">

    <div class="grid min-h-[100dvh] grid-rows-[auto_1fr_auto] p-4">

        <div class="flex gap-4 items-center">
            <div class="connecthive-logo">
                <a href="{{ route('dashboard') }}">
                    <img class="user-small-pp-img object-cover rounded-full" src="{{ asset('images/logo.png') }}"
                        alt="pp">
                </a>
            </div>

            <div style="width: 80%;">
                <form action="{{ route('search') }}" method="GET">

                    <input type="text"
                        class="w-full text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        name = 'query' placeholder="Search">

                </form>
            </div>

        </div>

        <nav class="mt-2 mb-2">

            <div class="flex flex-col">
                <a href="{{ route('dashboard') }}">
                    <div class="text-xl rounded-lg p-4 hover:bg-gray-100 cursor-pointer">
                        <p>Home</p>
                    </div>
                </a>

                <a href="#">
                    <div class="text-xl rounded-lg p-4 hover:bg-gray-100 cursor-pointer">
                        <p>Notification</p>
                    </div>
                </a>

                <a href="{{ route('message.index') }}">
                    <div class="text-xl rounded-lg p-4 hover:bg-gray-100 cursor-pointer">
                        <p>Message</p>
                    </div>
                </a>

                <a href="{{ route('friendship.friends') }}">
                    <div class="text-xl rounded-lg p-4 hover:bg-gray-100 cursor-pointer">
                        <p>Friends</p>
                    </div>
                </a>

                <a href="{{ route('friendship.friendrequests') }}">
                    <div class="relative text-xl rounded-lg p-4 hover:bg-gray-100 cursor-pointer">
                        <p>Friend Requests</p>


                        <div class="friendrequest-alert absolute top-4 right-28 w-2 h-2 rounded-full hidden"
                            style="background-color: #e63946;"></div>


                    </div>
                </a>
            </div>

        </nav>

        <div class="profile-box">

            <div class="flex gap-2 items-center justify-between">
                <a href="{{ route('profile.show', Auth::user()) }}">

                    <div class="hover:bg-gray-100 rounded-lg p-2 flex gap-2 items-center">

                        @if (Auth::user()->profile_picture)
                            <img class="user-small-pp-img object-cover rounded-full"
                                src="{{ asset('images/pp_images/' . Auth::user()->profile_picture) }}" alt="pp">
                        @else
                            <svg class="user-small-pp-img" xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                <path
                                    d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                            </svg>
                        @endif

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

    </div>

    <script>
        $(document).ready(function() {
            check_frndreq_alert();

            function check_frndreq_alert() {
                $.ajax({
                    url: `/friendship/friendrequests`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        if (result.length > 0) {
                            $('.friendrequest-alert').show()
                        } else {
                            $('.friendrequest-alert').hide()
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error fetching friend requests:', textStatus, errorThrown);
                    }
                });
            }

        });
    </script>
</section>
