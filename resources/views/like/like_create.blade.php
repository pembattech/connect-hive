<form action="{{ route('like.store') }}" method="post">
    @csrf

    <input type="hidden" name="PostID" value= "{{ $post['PostID'] }}">
    @if (in_array($post['PostID'], $likedPosts))
        <button type="submit" class="post-opt-hover">
            <svg class="asset-btn-svg" style="fill: blue;" xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                <path
                    d="M280-120v-520l280-280 74 74-52 206h338v176L774-120H280Zm80-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406ZM80-120v-520h200v80H160v360h120v80H80Z" />
            </svg>
        </button>
    @else
        <button type="submit" class="post-opt-hover">
            <svg class="asset-btn-svg" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                width="24px" fill="#e8eaed">
                <path
                    d="M280-120v-520l280-280 74 74-52 206h338v176L774-120H280Zm80-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406ZM80-120v-520h200v80H160v360h120v80H80Z" />
            </svg>
        </button>
    @endif

</form>
