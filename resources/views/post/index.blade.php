    @foreach ($posts as $post)
        <div class="post-section mt-6">
            <div class="post mb-6">

                <div class="post-top-bar p-2 top-0 w-full text-black items-center">

                    <div class="flex gap-2 items-center">
                        <img class="user-small-pp-img object-cover rounded-full"
                            src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        <p class="post-user"><strong>{{ $post['user']['name'] }}</strong> • <span
                                id="created_at">{{ $post['created_at']->format('d M Y, H:i') }}</span></p>
                    </div>

                    <div>
                        <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                            <path
                                d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z" />
                        </svg>
                    </div>

                </div>

                <div class="post-body" data-post-id= "{{ $post['PostID'] }}">

                    @if ($post['ImageURL'])
                        <div class="post-img-wrapper">

                            <div class="post-caption">
                                <p id="caption">{{ $post['Content'] }}</p>
                            </div>

                            <img class="post-image object-cover w-full"
                                src="{{ asset('post_images/' . $post['ImageURL']) }}" alt="post">
                        </div>
                    @else
                        <div class="post-caption">
                            <p id="caption">{{ $post['Content'] }}</p>
                        </div>
                    @endif

                </div>

                <div class="post-option-btns p-2 flex justify-between items-center">

                    <div class="flex gap-2 items-center">

                        @include('like.like_create')


                        <div class="post-opt-hover commentInput-btn" data-post-id="{{ $post['PostID'] }}">

                            <svg class="asset-btn-svg commentInput-svg" xmlns="http://www.w3.org/2000/svg"
                                height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path
                                    d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-240v-640h800v800L720-240H80Zm80-80h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                            </svg>

                        </div>

                    </div>

                    <div class="post-opt-hover">
                        <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                            <path
                                d="M680-80q-50 0-85-35t-35-85q0-6 3-28L282-392q-16 15-37 23.5t-45 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q24 0 45 8.5t37 23.5l281-164q-2-7-2.5-13.5T560-760q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-24 0-45-8.5T598-672L317-508q2 7 2.5 13.5t.5 14.5q0 8-.5 14.5T317-452l281 164q16-15 37-23.5t45-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T720-200q0-17-11.5-28.5T680-240q-17 0-28.5 11.5T640-200q0 17 11.5 28.5T680-160ZM200-440q17 0 28.5-11.5T240-480q0-17-11.5-28.5T200-520q-17 0-28.5 11.5T160-480q0 17 11.5 28.5T200-440Zm480-280q17 0 28.5-11.5T720-760q0-17-11.5-28.5T680-800q-17 0-28.5 11.5T640-760q0 17 11.5 28.5T680-720Zm0 520ZM200-480Zm480-280Z" />
                        </svg>
                    </div>

                </div>

                <p>
                    if liked gareko mancha friend cha vaney otherwise display `1000 likes`
                </p>

                <div class="post-bottom">

                    <div class="liked-by-imgs flex gap-2 relative">

                        <div class="first--liked-by-pp-img">
                            <img class="object-cover rounded-full absolute"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        </div>

                        <div class="sec--liked-by-pp-img">
                            <img class="object-cover rounded-full absolute"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        </div>

                        <div class="third--liked-by-pp-img">
                            <img class="object-cover rounded-full absolute"
                                src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                        </div>

                        <p class="mb-2 text-sm" style="margin-left: 20px;">
                            liked by <strong>@username</strong> and <strong>others</strong>
                        </p>
                    </div>

                    <div class="post-comment" data-post-id="{{ $post['PostID'] }}">
                        <p class="view-post-comment text-sm text-gray-700">
                            View all 11 comment
                        </p>

                    </div>

                </div>

            </div>

        </div>
    @endforeach


    @include('post.post_show')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            const $post_bodyElements = $('.post-body');
            const $popupForm = $('#post-popup');
            const $postIdInput = $('#postid');

            $post_bodyElements.on('click', function() {
                const postId = $(this).data('post-id');

                post_preview_ajax(postId);

            });


            const $commentInput_btnElements = $('.commentInput-btn');

            $commentInput_btnElements.on('click', function() {
                const postId = $(this).data('post-id');

                post_preview_ajax(postId);

            });

            const $post_commentElements = $('.post-comment');

            $post_commentElements.on('click', function() {
                const postId = $(this).data('post-id');

                post_preview_ajax(postId);

            });


            $('#cancelButton').on('click', function() {
                $popupForm.hide();
            });

            function post_preview_ajax(postId) {
                $.ajax({
                    url: `/post/${postId}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        $popupForm.show();

                        $("#commentInput").val("");

                        $(".post-user-popup").text(`${data.user_name}`);
                        $("#created_at_popup").text(`${formatDate(new Date(data.created_at))}`);
                        $("#postid").val(`${data.PostID}`);


                        const popup_post_body = $('.popup-post-body');
                        popup_post_body.empty();

                        if (data.ImageURL) {
                            popup_post_body.append(`
                                <div class="post-img-wrapper flex flex-col justify-between">
                                    <div class="post-caption">
                                        <p id="caption">${data.Content}</p>
                                    </div>
                                    <img class="post-image object-cover" src="{{ asset('post_images/') }}/${data.ImageURL}" alt="post">
                                </div>
                            `);
                        } else {
                            popup_post_body.append(`
                                <div class="post-caption flex items-center justify-center text-xl">
                                    <p id="caption">${data.Content}</p>
                                </div>
                            `);
                        }

                        // Fetch comments
                        fetchComments(postId);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error fetching post:', textStatus, errorThrown);
                    }
                });
            }

            function fetchComments(postId) {
                $.ajax({
                    url: `/post/${postId}/comments`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(comments) {
                        const commentsSection = $('.comments-section');
                        commentsSection.empty();

                        comments.forEach(comment => {
                            console.log(comment);
                            commentsSection.append(`
                        <div class="comment flex gap-2 p-2">
                             <div>
                                    <img class="user-small-pp-img object-cover rounded-full"
                                    src="{{ asset('images/profile-images/profile.jpg') }}" alt="pp">
                            </div>

                            <div>
                                <p><strong>${comment.user_name}:</strong> ${comment.Content}</p>
                                <p><small>${formatDate(new Date(comment.created_at))}</small></p>
                                <button class="comment-replyBtn text-sm text-blue hover-underline" data-comment-id=${comment.CommentID}>Reply</button>
                            </div>
                        </div>
                    `);
                        });

                        // $('.right-section-popup').append(commentsSection);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error fetching comments:', textStatus, errorThrown);
                    }
                });
            }

            $(document).on('click', '.comment-replyBtn', function() {
                const commentId = $(this).data('comment-id');
                // const postId = $($post_commentElements).data('post-id');

                console.log(commentId);

                // $("#postid").val(postId);
                $("#commentid").val(commentId);


            });


        });
    </script>
