document.addEventListener('DOMContentLoaded', function () {
    window.showOnlyPost = function (postId) {
        const post = document.getElementById('container-' + postId);
        const modal = document.getElementById('postModal');
        const modalContent = document.getElementById('modalPostContent');

        const postClone = post.cloneNode(true);
        modalContent.innerHTML = '';
        modalContent.appendChild(postClone);

        modal.style.display = "block";
        const closeButton = postClone.querySelector('.close-button');
        if (closeButton) {
            closeButton.style.display = 'none';
        }
    }

    window.closeModal = function () {
        const modal = document.getElementById('postModal');
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        const modal = document.getElementById('postModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    window.openComment = function (postId) {
        const comment = document.getElementById("comment" + postId);
        comment.classList.toggle("hidden");
    }

    window.editComment = function (commentId) {
        const editForm = document.getElementById("editForm" + commentId);
        const commentContent = editForm.parentElement.querySelector('.comment-content');
        const commentActions = editForm.parentElement.querySelector('.comment-actions');

        editForm.classList.remove("hidden");
        commentContent.classList.add("hidden");
        commentActions.classList.add("hidden");
    }

    window.cancelEdit = function (commentId) {
        const editForm = document.getElementById("editForm" + commentId);
        const commentContent = editForm.parentElement.querySelector('.comment-content');
        const commentActions = editForm.parentElement.querySelector('.comment-actions');

        editForm.classList.add("hidden");
        commentContent.classList.remove("hidden");
        commentActions.classList.remove("hidden");
    }

    window.editPost = function (postId) {
        const editPostForm = document.getElementById("editPostForm" + postId);
        const postContent = editPostForm.parentElement.querySelector('.post-content');
        const postActions = editPostForm.parentElement.querySelector('.post-actions');

        editPostForm.classList.remove("hidden");
        postContent.classList.add("hidden");
        if (postActions) postActions.classList.add("hidden");
    }

    window.cancelEditPost = function (postId) {
        const editPostForm = document.getElementById("editPostForm" + postId);
        const postContent = editPostForm.parentElement.querySelector('.post-content');
        const postActions = editPostForm.parentElement.querySelector('.post-actions');

        editPostForm.classList.add("hidden");
        postContent.classList.remove("hidden");
        if (postActions) postActions.classList.remove("hidden");
    }

    window.confirmDeletePost = function () {
        return confirm('Are you sure you want to delete this post?');
    }

    window.confirmDeleteComment = function () {
        return confirm('Are you sure you want to delete this comment?');
    }

    const alert = document.getElementById('myAlert');
    if (alert) {
        alert.classList.remove('hide');
        setTimeout(function () {
            alert.classList.add('hide');
        }, 5000);
    }
});
