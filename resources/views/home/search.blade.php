<x-app-layout>

    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">

        @include('layouts.sidebar')

        <section class="search-wrapper p-4">




            @if (isset($results))
                <div>
                    <div class="text-xl rounded-lg py-4">

                        <p>Search Results:</p>

                    </div>

                    <h4><strong>User:</strong></h4>
                    @if (count($results['users']) > 0)
                        <ul>
                            @foreach ($results['users'] as $user)
                                <li class="mb-4">
                                    <div class="searched-user-info flex gap-2 justify-between items-center p-4 rounded-lg"
                                        style="background-color: #f0f0f0;">

                                        <div class="flex gap-4 items-center">
                                            <a href="{{ route('profile.show', $user['id']) }}" style="display: block">
                                                <div class="flex gap-2 items-center">
                                                    <div>
                                                        @if ($user['profile_picture'])
                                                            <img class="user-small-pp-img object-cover rounded-full"
                                                                src="{{ asset('images/pp_images/' . $user['profile_picture']) }}"
                                                                alt="pp">
                                                        @else
                                                            <svg class="user-small-pp-img"
                                                                xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                                                <path
                                                                    d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <div class="search-user-name">

                                                        <p>
                                                            {{ $user->name }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div>

                                            @if (Auth::user()->id != $user->id)
                                                @if (in_array($user->id, $rec_friendreq))
                                                    <a href="{{ route('profile.show', $user['id']) }}">

                                                        <button data-user-id="{{ $user->id }}"
                                                            class="add-friend-button p-2 alice-blue flex items-center gap-2 text-blue font-medium text-lg rounded-lg w-full justify-center">
                                                            <p class="friendshipResponse-btn">
                                                                Response
                                                            </p>
                                                        </button>

                                                    </a>
                                                @else
                                                    <button data-user-id="{{ $user->id }}"
                                                        class="add-friend-button p-2 alice-blue flex items-center gap-2 text-blue font-medium text-lg rounded-lg justify-center">
                                                        @if (in_array($user['id'], $send_friendreq))
                                                            <p class="pending_addfriendBtnContent">
                                                                pending
                                                            </p>
                                                        @else
                                                            @if (!in_array($user['id'], $send_friendreq))
                                                                <p class="addfriendBtnContent">
                                                                    Add friend
                                                                </p>
                                                            @endif
                                                        @endif
                                                    </button>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No users found.</p>
                    @endif

                    <h4>Posts:</h4>
                    @if (count($results['posts']) > 0)
                        <ul>
                            @foreach ($results['posts'] as $post)
                                <li>{{ $post->content }} by {{ $post->user->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No posts found.</p>
                    @endif

                    <h4>Groups:</h4>
                    @if (count($results['groups']) > 0)
                        <ul>
                            @foreach ($results['groups'] as $group)
                                <li>{{ $group->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No groups found.</p>
                    @endif
                </div>
            @endif

        </section>

    </div>

    <script>
        $(document).ready(function() {
            $('.add-friend-button').on('click', function() {
                const $button = $(this);
                const user_id = $button.data('user-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: `/friendship/addfriend`,
                    method: 'POST',
                    data: {
                        user_id: user_id
                    },
                    success: function(data) {
                        console.log(data);
                        $button.text(data.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error fetching post:', textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
</x-app-layout>
