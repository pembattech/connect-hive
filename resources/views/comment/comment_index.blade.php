
    <div class="popup-modal" id = "comment-popup">

        <div class="popup-content bg-white border rounded-lg">

            <form action="{{ route('like.store') }}" method="post" id="post-form">
                @csrf

                {{-- <input type="hidden" name="PostID" value="{{ $post->PostID }}"> --}}
                <input type="hidden" id="post-id" name="post_id" value="">

                <textarea name="content" id="contentInput"
                    class="w-full px-4 pl-10 mt-2 mb-2 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    cols="30" rows="1" placeholder="Caption [optional]"></textarea>

                <button class="post-submit-button w-full mt-2 mb-2 alice-blue text-blue font-sm text-lg p-2 rounded-lg"
                    id="post-submit-button">Submit</button>

                <button class="cancel-button w-full mt-2 mb-2 text-white font-sm text-lg p-2 rounded-lg"
                    id="cancel-button">Cancel</button>



            </form>
        </div>
    </div>

    {{-- <script>
        var commentInput = document.getElementById('commentInput');
        var commentSubmit = document.getElementById('commentSubmit');

        commentInput.addEventListener('input', function() {
            if (commentInput.value.trim().length > 0) {
                commentSubmit.style.display = 'block';
                console.log(commentInput.value)
            } else {
                commentSubmit.style.display = 'none';
            }
        });
    </script> --}}

