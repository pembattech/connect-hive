<x-app-layout>

    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">

        @include('layouts.sidebar')

        <section class="friendship-wrapper p-4">

            <h1 class="font-semibold text-gray-900 text-xl" style="padding-bottom: 1rem;">Friends <span
                    class="text-sm">({{ count($friends) }})</span></h1>

            @if (count($friends) > 0)

                <div class="grid grid-cols-2 gap-4">
                    @foreach ($friends as $friend)
                        <div class="bg-white border border-gray-200 rounded-lg shadow" id="friend-{{ $friend->id }}">

                            <div class="flex flex-col items-center p-4 ">

                                @if ($friend['profile_picture'])
                                    <img class="user-small-pp-img w-24 h-24 mb-3 shadow-lg object-cover rounded-full"
                                        src="{{ asset('images/pp_images/' . $friend['profile_picture']) }}"
                                        alt="pp">
                                @else
                                    <svg class="user-small-pp-img" xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                        <path
                                            d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                    </svg>
                                @endif

                                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $friend->name }}</h5>

                                <div class="flex mt-4 md:mt-6">
                                    <button class="unfriend-btn inline-flex items-center px-4 py-2 bg-red-700
                                        hover:bg-red-800 focus:ring-4 focus:ring-red-300 text-sm font-medium text-center
                                        text-white rounded-lg focus:outline-none"
                                        data-friend-id="{{ $friend->id }}">Unfriend</button>

                                    <a href="#"
                                        class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Message</a>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No friends yet.</p>
            @endif
        </section>
    </div>

    <script>
        $(document).on('click', '.unfriend-btn', function() {
            const friendId = $(this).data('friend-id');

            $.ajax({
                url: '/friendship/unfriend',
                method: 'DELETE',
                data: {
                    friend_id: friendId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {

                        // Optionally, remove the friend from the UI
                        $(`#friend-${friendId}`).remove();
                    } else {
                        alert('Failed to remove friendship.');
                    }
                },
                error: function() {
                    alert('An error occurred while trying to unfriend.');
                }
            });
        });
    </script>
</x-app-layout>
