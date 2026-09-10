(function () {
    const uploadUrl = document.querySelector('meta[name="admin-editor-upload"]')?.getAttribute('content')
        || '/admin/editor/upload';
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    if (typeof window.CKEDITOR !== 'undefined') {
        window.CKEDITOR.plugins.add('lwuploadimage', {
            init(editor) {
                editor.addCommand('lwUploadImage', {
                    exec(editorInstance) {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.accept = 'image/jpeg,image/png,image/gif,image/webp,image/avif';
                        input.style.display = 'none';
                        document.body.appendChild(input);

                        input.addEventListener('change', () => {
                            const file = input.files && input.files[0];
                            input.remove();

                            if (!file) {
                                return;
                            }

                            const data = new FormData();
                            data.append('upload', file);
                            if (csrfToken) {
                                data.append('_token', csrfToken);
                            }

                            fetch(uploadUrl, {
                                method: 'POST',
                                body: data,
                                credentials: 'same-origin',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                },
                            })
                                .then(async (response) => {
                                    const contentType = response.headers.get('content-type') || '';
                                    const payload = contentType.includes('application/json')
                                        ? await response.json()
                                        : null;

                                    if (!response.ok || !payload?.url) {
                                        const message = payload?.error?.message
                                            || payload?.message
                                            || 'Image upload failed.';
                                        throw new Error(message);
                                    }

                                    return payload.url;
                                })
                                .then((url) => {
                                    const alt = file.name.replace(/\.[^.]+$/, '').replace(/[-_]+/g, ' ');
                                    const image = window.CKEDITOR.dom.element.createFromHtml(
                                        `<img src="${window.CKEDITOR.tools.htmlEncodeAttr(url)}" alt="${window.CKEDITOR.tools.htmlEncodeAttr(alt)}" />`,
                                        editorInstance.document
                                    );

                                    editorInstance.insertElement(image);
                                    editorInstance.fire('change');
                                })
                                .catch((error) => {
                                    window.alert(error.message || 'Image upload failed.');
                                });
                        });

                        input.click();
                    },
                });

                editor.ui.addButton('LwUploadImage', {
                    label: 'Upload image',
                    command: 'lwUploadImage',
                    toolbar: 'insert,0',
                    icon: 'image',
                });
            },
        });
    }

    function syncEditors() {
        if (typeof window.CKEDITOR === 'undefined') {
            return;
        }

        for (const id in window.CKEDITOR.instances) {
            if (window.CKEDITOR.instances[id]) {
                window.CKEDITOR.instances[id].updateElement();
            }
        }
    }

    function initEditors() {
        if (typeof window.CKEDITOR === 'undefined') {
            console.error('CKEditor failed to load.');
            return;
        }

        document.querySelectorAll('textarea.ad-rich-text').forEach((textarea, index) => {
            if (!textarea.id) {
                textarea.id = 'lw-editor-' + index;
            }

            if (window.CKEDITOR.instances[textarea.id]) {
                return;
            }

            const isBody = textarea.name === 'body';
            const height = isBody ? 380 : 160;

            window.CKEDITOR.replace(textarea.id, {
                height,
                extraPlugins: 'lwuploadimage',
                removePlugins: 'elementspath',
                extraAllowedContent: 'img[src,alt,width,height,class,style]',
                resize_enabled: true,
                toolbar: isBody
                    ? [
                        ['Format', 'Bold', 'Italic', 'Link', 'Unlink'],
                        ['NumberedList', 'BulletedList', 'Blockquote'],
                        ['LwUploadImage', 'HorizontalRule', 'RemoveFormat'],
                        ['Source', 'Maximize'],
                    ]
                    : [
                        ['Bold', 'Italic', 'Link'],
                        ['NumberedList', 'BulletedList'],
                        ['RemoveFormat'],
                    ],
            });
        });
    }

    function boot() {
        initEditors();

        document.querySelectorAll('form').forEach((form) => {
            form.addEventListener('submit', syncEditors);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();
