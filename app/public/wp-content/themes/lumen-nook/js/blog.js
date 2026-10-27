(function () {
    'use strict';

    var button = document.querySelector('.like-button');

    if (!button || typeof lumenNookBlog === 'undefined') {
        return;
    }

    button.addEventListener('click', function () {
        var request = new XMLHttpRequest();
        var formData = new FormData();

        button.disabled = true;
        formData.append('action', 'lumen_nook_like_post');
        formData.append('nonce', lumenNookBlog.likeNonce);
        formData.append('postId', button.getAttribute('data-post-id'));

        request.open('POST', lumenNookBlog.ajaxUrl);
        request.onload = function () {
            var response;

            try {
                response = JSON.parse(request.responseText);
            } catch (error) {
                button.disabled = false;
                return;
            }

            if (response.success) {
                button.classList.toggle('is-liked', response.data.liked);
                button.setAttribute('aria-pressed', response.data.liked ? 'true' : 'false');
                button.querySelector('.like-label').textContent = response.data.liked ? 'Liked' : 'Like';
                button.querySelector('.like-count').textContent = response.data.likes;
            }

            button.disabled = false;
        };
        request.onerror = function () {
            button.disabled = false;
        };
        request.send(formData);
    });
}());
