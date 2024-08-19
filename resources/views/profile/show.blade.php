<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">

        @include('layouts.sidebar')

        <section class="profile-wrapper p-4">

            <div class="profile-container grid grid-cols-2 justify-between items-center">
                <div>
                    <h1 class="text-xl"><strong>{{ $user->name }}</strong></h1>
                    <p>Email: {{ $user->email }}</p>
                </div>

                <div class="w-full cursor-pointer" id="show_upload_pp_modal">

                    @if ($user['profile_picture'])
                        <img class="user-big-pp-img object-cover rounded-full"
                            src="{{ asset('images/pp_images/' . $user['profile_picture']) }}" alt="pp">
                    @else
                        <svg class="user-big-pp-img" xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path
                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                        </svg>
                    @endif


                </div>

            </div>

            <div>
                @if (Auth::user()->id == $user->id)
                    <a href="{{ route('profile.edit') }}">
                        <button
                            class="mt-2 mb-2 alice-blue flex items-center gap-2 text-blue font-medium text-lg py-2 rounded-lg w-full justify-center">
                            Edit Profile
                        </button>
                    </a>
                @endif
            </div>

            @if (count($posts) > 0)
                @include('post.index')
            @else
                <p class="text-center mt-6">No posts available.</p>
            @endif

        </section>

        @if (Auth::user()->id == $user->id)
            <div class="popup-modal" id = "popup-modal">

                <div class="popup-content bg-white border rounded-lg" id="upload_pp_popup-modal" >

                        <form action="{{ route('profile.upload_pp') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mt-2 mb-2">
                                <input type="file" name="image" required>
                            </div>

                            <button
                                class="post-submit-button w-full mt-2 mb-2 alice-blue text-blue font-sm text-lg p-2 rounded-lg"
                                id="post-submit-button">Submit</button>

                            <button class="cancel-button w-full mt-2 mb-2 text-white font-sm text-lg p-2 rounded-lg"
                                id="cancel-button">Cancel</button>


                        </form>
                    </section>

                </div>
            </div>

            <script>
                const showUploadPpModal = document.getElementById('show_upload_pp_modal');
                const uploadPpHiddenDiv = document.getElementById('popup-modal');
                const hidePopup_upload_pp_modal = document.getElementById('cancel-button');

                showUploadPpModal.addEventListener('click', () => {
                    uploadPpHiddenDiv.style.display = 'block';
                });

                hidePopup_upload_pp_modal.addEventListener('click', () => {
                    uploadPpHiddenDiv.style.display = 'none';
                });
            </script>
        @endif

    </div>







</x-app-layout>
