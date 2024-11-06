 <form
                                                    action="{{ route('delete.comment', ['comment' => $comment->id]) }}"
                                                    method="POST" class="m-0 inline comment-delete-form "
                                                    onsubmit="return confirmDeleteComment()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-sm font-semibold ml-1">Delete</button>
                                                </form>
