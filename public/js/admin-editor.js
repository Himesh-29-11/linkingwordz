document.addEventListener('DOMContentLoaded', () => {
    if (typeof ClassicEditor === 'undefined') {
        return;
    }

    const editors = new Map();
    const textareas = document.querySelectorAll('textarea.ad-rich-text');

    textareas.forEach((textarea) => {
        ClassicEditor.create(textarea, {
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'undo',
                'redo',
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                ],
            },
        })
            .then((editor) => {
                editors.set(textarea, editor);
                const form = textarea.closest('form');
                if (form && !form.dataset.ckEditorBound) {
                    form.dataset.ckEditorBound = '1';
                    form.addEventListener('submit', () => {
                        editors.forEach((instance, field) => {
                            field.value = instance.getData();
                        });
                    });
                }
            })
            .catch((error) => {
                console.error('CKEditor failed to load:', error);
            });
    });
});
