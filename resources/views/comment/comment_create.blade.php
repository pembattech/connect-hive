<form action="{{ route('comment.store') }}" method="post">
    @csrf

    <input type="hidden" id="postid" name="PostID" value="">

    <div class="comment-inputbox flex gap-2 rounded-lg">

        <textarea name="commentContent" id="commentInput" class="px-4 pl-10 mt-2 mb-2 text-gray-700 border-0" cols="30"
            rows="1" placeholder="Add a comment..."></textarea>

        <button class="alice-blue text-blue font-sm text-lg p-2 rounded-lg" id="commentSubmit">Submit</button>

    </div>

</form>

<script>
    var commentInput = document.getElementById('commentInput');
    var commentSubmit = document.getElementById('commentSubmit');

    commentInput.addEventListener('input', function() {
        if (commentInput.value.trim().length > 0) {
            commentSubmit.classList.add('show');
        } else {
            commentSubmit.classList.remove('show');
        }
    });
</script>
