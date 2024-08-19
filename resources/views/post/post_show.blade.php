<div class="popup-modal" id="post-popup">

    <div class="popup-content border">

        <div id="cancelButton" class="absolute">

            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e9e9e9">
                <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>

        </div>

        <div class="post-preview relative rounded-lg bg-white grid grid-cols-2 gap-4 justify-center"
            style="height: 100%;">


            <div class="popup-post-body">

                {{-- AUTO GENERATE BY AJAX --}}

            </div>

            <div class="right-section-popup flex flex-col p-2" style="height: 90dvh;">

                <div class="post-top-bar text-black items-center p-2" style="flex-shrink: 0;">

                    <div class="flex gap-2 items-center">
                        <div>

                            @if ($post['user']['profile_picture'])
                                <img class="user-small-pp-img object-cover rounded-full"
                                    src="{{ asset('images/pp_images/' . $post['user']['profile_picture']) }}"
                                    alt="pp">
                            @else
                                <svg class="user-small-pp-img" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                </svg>
                            @endif

                        </div>

                        <div>

                            <p><strong class="post-user-popup"></strong></p>
                            <p class="text-sm" id="created_at_popup"></p>

                        </div>
                    </div>

                    <div>
                        <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                            <path
                                d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z" />
                        </svg>

                    </div>

                </div>


                <div class="comments-section text-sm" style="overflow: auto;">

                    {{-- Auto Generate by FetchComment Func --}}
                </div>


                <div class="post-bottom">

                    <div class="post-option-btns flex justify-between items-center">

                        <div class="flex gap-2 items-center">

                            <form action="{{ route('like.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="PostID" id="postid__like" class="postid__like"
                                    value= "">

                                <button type="submit" class="post-opt-hover">
                                    <svg class="asset-btn-svg post_show_like_btn" xmlns="http://www.w3.org/2000/svg"
                                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                        <path
                                            d="M280-120v-520l280-280 74 74-52 206h338v176L774-120H280Zm80-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406ZM80-120v-520h200v80H160v360h120v80H80Z" />
                                    </svg>
                                </button>

                            </form>


                            <p id="like_count">
                                {{-- Auto-Generate --}}
                            </p>

                            <div class="post-opt-hover">

                                <label for="commentInput">
                                    <svg class="asset-btn-svg" data-post-id="{{ $post['PostID'] }}"
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-240v-640h800v800L720-240H80Zm80-80h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                                    </svg>

                                </label>

                            </div>
                            <p id="comment_count">
                                {{-- Auto-Generate --}}
                            </p>


                        </div>

                        <div class="post-opt-hover">
                            <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path
                                    d="M680-80q-50 0-85-35t-35-85q0-6 3-28L282-392q-16 15-37 23.5t-45 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q24 0 45 8.5t37 23.5l281-164q-2-7-2.5-13.5T560-760q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-24 0-45-8.5T598-672L317-508q2 7 2.5 13.5t.5 14.5q0 8-.5 14.5T317-452l281 164q16-15 37-23.5t45-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T720-200q0-17-11.5-28.5T680-240q-17 0-28.5 11.5T640-200q0 17 11.5 28.5T680-160ZM200-440q17 0 28.5-11.5T240-480q0-17-11.5-28.5T200-520q-17 0-28.5 11.5T160-480q0 17 11.5 28.5T200-440Zm480-280q17 0 28.5-11.5T720-760q0-17-11.5-28.5T680-800q-17 0-28.5 11.5T640-760q0 17 11.5 28.5T680-720Zm0 520ZM200-480Zm480-280Z" />
                            </svg>
                        </div>

                    </div>

                    @include('comment.comment_create')

                </div>



            </div>



        </div>

    </div>

</div>
