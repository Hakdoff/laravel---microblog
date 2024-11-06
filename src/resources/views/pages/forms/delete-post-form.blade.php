<form action="{{ route('delete.post', ['post' => $post]) }}" method="post"
                                    onsubmit="return confirmDeletePost()">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <span class="underline">Delete</span>
                                    </button>
                                </form>
