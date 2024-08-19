<x-app-layout>

    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">

        @include('layouts.sidebar')

        <section class="friendship-wrapper p-4">

            <h1 class="font-semibold text-gray-900 text-xl" style="padding-bottom: 1rem;">Friend Requests <span class="text-sm">({{ count($friendrequests) }})</span></h1>

            @if (count($friendrequests) > 0)
                <ul>
                    @foreach ($friendrequests as $frndrequest)
                        <li class="mb-4">
                            <div class="friendrequest-user-info flex gap-2 justify-between items-center p-4 rounded-lg"
                                style="background-color: #f0f0f0;">

                                <a href="{{ route('profile.show', $frndrequest->user1->id) }}" style="display: block">
                                    <div class="flex gap-2 justify-between items-center">

                                        <div>
                                            @if ($frndrequest->user1['profile_picture'])
                                                <img class="user-small-pp-img object-cover rounded-full"
                                                    src="{{ asset('images/pp_images/' . $frndrequest->user1['profile_picture']) }}"
                                                    alt="pp">
                                            @else
                                                <svg class="user-small-pp-img" xmlns="http://www.w3.org/2000/svg"
                                                    height="24px" viewBox="0 -960 960 960" width="24px"
                                                    fill="#000000">
                                                    <path
                                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                                </svg>
                                            @endif
                                        </div>

                                        <div class="friendrequest-user-name">

                                            <p>
                                                {{ $frndrequest->user1->name }}
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <div class="flex gap-4">
                                    <form action="{{ route('friendship.acceptPending') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="sender_id" value="{{ $frndrequest->user1->id }}">
                                        <button
                                            class="accept_frndreq-btn w-full mt-2 mb-2 alice-blue text-blue font-sm text-lg p-2 rounded-lg">Accept</button>
                                    </form>

                                    <form action="{{ route('friendship.cancelPending') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="sender_id" value="{{ $frndrequest->user1->id }}">

                                        <button
                                            class="cancel-button w-full mt-2 mb-2 text-white font-sm text-lg p-2 rounded-lg"
                                            id="cancel-button">Cancel</button>
                                    </form>
                                </div>

                            </div>

                        </li>
                    @endforeach
                </ul>
            @else
                <p>No users found.</p>
            @endif

        </section>

    </div>

</x-app-layout>
