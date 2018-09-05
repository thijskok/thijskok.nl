window.Trix = require('trix');

(function() {
    var createStorageKey, host, token, uploadAttachment;

    Trix.config.attachments.preview.caption = {
        name: false,
        size: false
    };

    document.addEventListener("trix-attachment-add", function(event) {
        var attachment;
        attachment = event.attachment;
        if (attachment.file) {
            return uploadAttachment(attachment);
        }
    });

    host = "/upload";
    token = document.head.querySelector('meta[name="csrf-token"]');

    uploadAttachment = function(attachment) {
        var file, form, key, xhr;
        file = attachment.file;
        form = new FormData;
        form.append("_token", token.content);
        form.append("Content-Type", file.type);
        form.append("file", file);
        xhr = new XMLHttpRequest;
        xhr.open("POST", host, true);
        xhr.upload.onprogress = function(event) {
            var progress;
            progress = event.loaded / event.total * 100;
            return attachment.setUploadProgress(progress);
        };
        xhr.onload = function() {
            var href, url;
            if (xhr.status === 200) {
                url = href = xhr.response;
                return attachment.setAttributes({
                    url: url,
                    href: href
                });
            }
        };
        return xhr.send(form);
    };
}).call(this);