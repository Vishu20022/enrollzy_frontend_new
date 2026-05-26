$(document).ready(function () {
    // Helper to get CSRF token
    const getToken = () => $('meta[name="csrf-token"]').attr('content');

    // Like Toggle
    $(document).on('click', '.like-btn', function () {
        let btn = $(this);
        let id = btn.data('id');
        let type = btn.data('type');

        $.ajax({
            url: "/community/interact/like",
            type: "POST",
            data: {
                _token: getToken(),
                id: id,
                type: type
            },
            success: function (res) {
                if (res.success) {
                    btn.find('.like-count').text(res.count);
                    if (res.liked) {
                        btn.addClass('active').css('color', 'var(--theme-one)');
                    } else {
                        btn.removeClass('active').css('color', '');
                    }
                }
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    alert('Please login to like this!');
                } else if (xhr.status === 419) {
                    alert('Session expired. Please refresh the page.');
                } else {
                    alert('An error occurred. Status: ' + xhr.status);
                }
            }
        });
    });

    // Toggle Comment Box
    $(document).on('click', '.comment-toggle', function () {
        $(this).closest('.post-card').find('.add-comment').toggleClass('d-none');
    });

    // Image Preview for Replies
    $(document).on('change', '.reply-image-input', function (e) {
        let container = $(this).closest('.add-comment, .reply-form-wrap');
        let previewContainer = container.find('.reply-image-preview');
        let img = previewContainer.find('img');
        
        let file = e.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
                previewContainer.removeClass('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.addClass('d-none');
            img.attr('src', '');
        }
    });

    $(document).on('click', '.remove-reply-image', function () {
        let container = $(this).closest('.add-comment, .reply-form-wrap');
        let fileInput = container.find('.reply-image-input');
        let previewContainer = container.find('.reply-image-preview');
        let img = previewContainer.find('img');
        
        fileInput.val('');
        previewContainer.addClass('d-none');
        img.attr('src', '');
    });

    // Store Reply
    $(document).on('click', '.add-comment-btn', function () {
        let btn = $(this);
        let container = btn.parent(); 
        
        if (container.hasClass('input-group')) {
            container = btn.closest('.reply-form-wrap');
        } else {
            container = btn.closest('.add-comment, .reply-form-wrap');
        }
        
        let textarea = container.find('.comment-input');
        let fileInput = container.find('.reply-image-input');

        let content = textarea.val();
        let questionId = btn.data('question-id');
        let parentId = btn.data('parent-id') || null;

        if (!content && (!fileInput.length || !fileInput[0].files.length)) return;

        let formData = new FormData();
        formData.append('_token', getToken());
        formData.append('question_id', questionId);
        if (parentId) {
            formData.append('parent_id', parentId);
        }
        if (content) {
            formData.append('content', content);
        } else {
            formData.append('content', 'Image Reply');
        }

        if (fileInput.length && fileInput[0].files.length > 0) {
            formData.append('image', fileInput[0].files[0]);
        }
        
        btn.prop('disabled', true).text('Posting...');

        $.ajax({
            url: "/community/interact/reply",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.success) {
                    alert(res.message); // Tell user it's awaiting admin approval
                    location.reload();
                } else {
                    alert(res.message || 'Error posting reply');
                    btn.prop('disabled', false).text('Post');
                }
            },
            error: function (xhr) {
                btn.prop('disabled', false).text('Post');
                if (xhr.status === 401) {
                    alert('Please login to comment!');
                } else if (xhr.status === 419) {
                    alert('Session expired. Please refresh the page.');
                } else {
                    alert('An error occurred. Status: ' + xhr.status);
                }
            }
        });
    });

    // Nested Reply Trigger
    $(document).on('click', '.reply-trigger', function () {
        $(this).closest('.comment-item').find('.reply-form-wrap').first().toggleClass('d-none');
    });

    // Share Button
    $(document).on('click', '.share-btn', function () {
        let url = $(this).data('url');
        navigator.clipboard.writeText(url).then(() => {
            let originalText = $(this).html();
            $(this).text('✅ Copied!');
            setTimeout(() => {
                $(this).html(originalText);
            }, 2000);
        }).catch(err => {
            console.error('Could not copy text: ', err);
        });
    });
});
