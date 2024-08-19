<div class="popup-modal" id = "popup-modal">

    <div class="popup-content bg-white border rounded-lg">

        <div>
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <textarea name="content" id="contentInput"
                    class="w-full mt-2 mb-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    cols="30" rows="1" placeholder="Caption [optional]"></textarea>

                <div class="mt-2 mb-2">
                    <input type="file" name="image" required>
                </div>

                <button class="post-submit-button w-full mt-2 mb-2 alice-blue text-blue font-sm text-lg p-2 rounded-lg"
                    id="post-submit-button">Submit</button>

                <button class="cancel-button w-full mt-2 mb-2 text-white font-sm text-lg p-2 rounded-lg"
                    id="cancel-button">Cancel</button>


            </form>
        </div>

    </div>
</div>
