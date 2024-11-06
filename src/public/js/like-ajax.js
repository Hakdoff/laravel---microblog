document.addEventListener("DOMContentLoaded", () => {
    window.toggleLike = function(postId) {
        const likeButtonElement = document.getElementById(`like-button-${postId}`);
        const likeButtonText = likeButtonElement.querySelector('.like-text');
        const isLiked = likeButtonText.textContent === 'Unlike';
        const url = isLiked ? `/post/${postId}/unlike` : `/post/${postId}/like`;
        const likeText = isLiked ? 'Like' : 'Unlike';

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios.post(url, {
            _token: csrfToken
        })
        .then(response => {
            const likesCount = response.data.likes_count;
            const likeUsers = response.data.like_users;

            const likesCountElement = document.getElementById(`likes-count-${postId}`);
            if (likesCountElement) {
                likesCountElement.textContent = `${likesCount} likes`;
            }

            const likeUsersElement = document.getElementById(`like-users-${postId}`);
            if (likeUsersElement) {
                likeUsersElement.innerHTML = '';

                likeUsers.slice(0, 10).forEach(user => {
                    const userElement = document.createElement('div');
                    userElement.textContent = user;
                    likeUsersElement.appendChild(userElement);
                });

                if (likesCount > 10) {
                    const moreElement = document.createElement('div');
                    moreElement.textContent = `and ${likesCount - 10} more...`;
                    likeUsersElement.appendChild(moreElement);
                }
            }

            likeButtonElement.classList.toggle('liked')
            likeButtonText.textContent = likeText;
        })
        .catch(error => {
            console.error('Error toggling like:', error);
        });
    }
});
