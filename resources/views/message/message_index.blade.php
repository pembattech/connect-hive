<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 1fr 2fr; align-items: start;">
        @include('layouts.sidebar')

        <section class="message-user-wrapper">
            <div class="flex items-center justify-between">

                <h1 class="p-4 font-semibold text-gray-900 text-xl">Messages</h1>

            </div>


            <div class="w-1/2">
                <input type="text"
                    class="w-full px-4 pl-10 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    placeholder="Search Direct Message">
            </div>


            <div class="messages">

                <div class="flex gap-2 p-2 rounded-lg hover:bg-gray-100">
                    <img class="friend-small-pp-img object-cover rounded-full"
                        src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                    
                        <div>
                            <p class="user-name">Pemba Tamang</p>
                            <p>This is message.</p>
                        </div>
                </div>

            </div>

        </section>

        <section class="message-box">
            <h1>message box</h1>
        </section>


    </div>
</x-app-layout>
