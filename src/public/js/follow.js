$(document).ready(function () {
    $(".follow-button").on("click", function () {
        const button = $(this);
        const userId = button.data("user-id");
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (button.text() === "Follow") {
            $.ajax({
                url: "/follow-ajax/" + userId,
                method: "POST",
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
                    if (response.success) {
                        button.text("Unfollow");
                    }
                },
                error: function (response) {
                    alert("Error following user.");
                },
            });

            return;
        } 
        $.ajax({
            url: "/unfollow-ajax/" + userId,
            method: "POST",
            data: {
                _token: csrfToken,
            },
            success: function (response) {
                if (response.success) {
                    button.text("Follow");
                }
            },
            error: function (response) {
                alert("Error unfollowing user.");
            },
        });
    });
});
