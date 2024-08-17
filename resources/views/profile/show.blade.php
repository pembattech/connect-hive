<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 2fr 1fr; align-items: start;">

        @include('layouts.sidebar')

        <section class="profile-wrapper p-4">

            <div class="profile-container grid grid-cols-2 justify-between items-center">
                <div>
                    <h1 class="text-xl"><strong>{{ $user->name }}</strong></h1>
                    <p>Email: {{ $user->email }}</p>
                </div>

                <div>
                    <img class="user-big-pp-img object-cover rounded-full"
                        src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
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

        <section>
            <form action="{{ route('profile.upload_pp') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mt-2 mb-2">
                    <input type="file" name="image" required>
                </div>

                <button class="post-submit-button w-full mt-2 mb-2 alice-blue text-blue font-sm text-lg p-2 rounded-lg"
                    id="post-submit-button">Submit</button>

                <button class="cancel-button w-full mt-2 mb-2 text-white font-sm text-lg p-2 rounded-lg"
                    id="cancel-button">Cancel</button>


            </form>
        </section>





</x-app-layout>
