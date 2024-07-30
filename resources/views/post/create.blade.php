<x-app-layout>
    <div class="create-post flex gap-4 mt-4 mb-4 justify-between">
        <div class="w-full">

            <form action="{{ route('post.store') }}" method="post">
                @csrf

                <div class="relative">

                    <textarea name="content" id="contentInput"
                        class="w-full px-4 pl-10 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        cols="30" rows="1" placeholder="What's on your mind, {{ Auth::user()->name }}?"></textarea>

                    <button class="post-submit-button absolute alice-blue text-blue font-sm text-lg p-2 rounded-lg" id="post-submit-button">Submit</button>

                </div>

            </form>

        </div>

        <div class="post-img-btn" id="post-img-btn">

            <img class="other-asset-img" src="{{ asset('images/picture.png') }}" alt="upload picture">

        </div>

    </div>


    <script>
        const textInput = document.getElementById('contentInput');
        const submitBtn = document.getElementById('post-submit-button');

        textInput.addEventListener('focus', () => {
            submitBtn.style.display = 'inline-block';
        });

        textInput.addEventListener('blur', () => {
            if (textInput.value.trim() === '') {
                submitBtn.style.display = 'none';
            }
        });
    </script>



</x-app-layout>
