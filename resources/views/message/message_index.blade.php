<x-app-layout>
    <div class="first-page grid gap-10 min-h-screen" style="grid-template-columns: 1fr 1fr 2fr; align-items: start;">
        @include('layouts.sidebar')

        <section class="message-user-wrapper">
            <div class="flex items-center justify-between">

                <h1 class="p-4 font-semibold text-gray-900 text-xl">Messages</h1>

            </div>


            <div>
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


            <form>
                <label for="chat" class="sr-only">Your message</label>
                <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50">
                    
                    <textarea id="chat" rows="1"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Your message..."></textarea>
                    <button type="submit"
                        class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
                </div>
            </form>

        </section>


    </div>
</x-app-layout>
