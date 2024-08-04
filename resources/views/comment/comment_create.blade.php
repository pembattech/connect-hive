<form action="{{ route('comment.store') }}" method="post">
    @csrf

    <input type="hidden" id="postid" name="PostID" value="">

    <textarea name="commentContent" id="commentInput" class="px-4 pl-10 mt-2 mb-2 text-gray-700 border-0" cols="30" rows="1"
        placeholder="Add a comment..."></textarea>

    <button class="post-submit-button mt-2 mb-2 alice-blue text-blue font-sm text-lg p-2 rounded-lg"
        id="commentSubmit">Submit</button>
    {{-- 
    <button class="cancel-button w-full mt-2 mb-2 text-white font-sm text-lg p-2 rounded-lg"
        id="cancel-button">Cancel</button> --}}
</form>

<script>
    var commentInput = document.getElementById('commentInput');
    var commentSubmit = document.getElementById('commentSubmit');

    commentInput.addEventListener('input', function() {
        if (commentInput.value.trim().length > 0) {
            commentSubmit.style.display = 'block';
        } else {
            commentSubmit.style.display = 'none';
        }
    });
</script>
