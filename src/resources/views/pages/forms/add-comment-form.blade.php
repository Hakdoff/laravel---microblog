<form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="POST">
    @csrf
    <label for="comment" class="w-full">Comment as <span
            class="font-semibold">{{ auth()->user()->username }}</span></label>
    <div class="flex flex-end items-center gap-2">
        <textarea class="d-dashboard__border-gray w-full mt-2 p-2 rounded-lg" name="content"
            placeholder="Enter your comment here"></textarea>
        <button
            class="py-5 px-10 me-2 mt-1 text-sm font-medium text-gray-100 focus:outline-none bg-mygray rounded-lg border border-mygray focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            type="submit">Comment</button>
    </div>
</form>
