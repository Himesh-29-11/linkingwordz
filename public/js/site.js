(() => {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const targets = document.querySelectorAll(
        '.lw-audience__card, .lw-problem__item, .lw-services__card, .lw-why__item, .lw-process__step, .lw-work__card, .lw-testimonials__item, .lw-insights__card, .lw-founder__figure, .lw-founder__copy, .lw-hero__copy, .lw-hero__visual'
    );

    targets.forEach((el, i) => {
        el.classList.add('lw-reveal');
        el.style.setProperty('--lw-reveal-delay', `${Math.min(i % 6, 5) * 70}ms`);
    });

    if (reduce || !('IntersectionObserver' in window)) {
        targets.forEach((el) => el.classList.add('lw-reveal--in'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('lw-reveal--in');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.16, rootMargin: '0px 0px -8% 0px' });

    targets.forEach((el) => observer.observe(el));
})();

(() => {
    document.querySelectorAll('.lw-abx-posts__reel').forEach((wrap) => {
        const video = wrap.querySelector('video');
        if (!video) return;

        const sync = () => {
            wrap.classList.toggle('is-playing', !video.paused && !video.ended);
        };

        video.addEventListener('play', sync);
        video.addEventListener('playing', sync);
        video.addEventListener('pause', sync);
        video.addEventListener('ended', sync);
        wrap.addEventListener('click', (event) => {
            if (event.target.closest('video')) return;
            if (video.paused) video.play();
            else video.pause();
        });
        sync();
    });
})();

(() => {
    const storeKey = 'lw-blog-engage';

    const readStore = () => {
        try {
            return JSON.parse(localStorage.getItem(storeKey) || '{}') || {};
        } catch {
            return {};
        }
    };

    const writeStore = (data) => {
        localStorage.setItem(storeKey, JSON.stringify(data));
    };

    const stateFor = (slug) => {
        const store = readStore();
        if (!store[slug]) {
            store[slug] = { liked: false, saved: false, extraLikes: 0, comments: [] };
        }
        if (!Array.isArray(store[slug].comments)) store[slug].comments = [];
        return store;
    };

    const renderMeta = (root, baseLikes, baseComments, views, extraLikes, extraComments) => {
        const meta = root.querySelector('[data-ig-meta]');
        if (!meta) return;
        const likes = Math.max(0, Number(baseLikes) + extraLikes);
        const comments = Math.max(0, Number(baseComments) + extraComments);
        meta.textContent = `${likes} likes · ${views} views · ${comments} comments`;
    };

    const renderComments = (list, comments) => {
        if (!list) return;
        list.innerHTML = comments.map((item) => {
            const name = item.name || 'Guest';
            const text = String(item.text || '').replace(/[&<>]/g, (ch) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[ch]));
            return `<li><b>${name}</b>${text}</li>`;
        }).join('');
    };

    const bindRoot = (root) => {
        const actions = root.matches('[data-post-slug]') ? root : root.querySelector('[data-post-slug]');
        if (!actions) return;

        const slug = actions.dataset.postSlug;
        const baseLikes = Number(actions.dataset.likes || 0);
        const baseComments = Number(actions.dataset.comments || 0);
        const views = Number(actions.dataset.views || 0);
        const likeBtn = root.querySelector('[data-ig-action="like"]');
        const commentBtn = root.querySelector('[data-ig-action="comment"]');
        const shareBtn = root.querySelector('[data-ig-action="share"]');
        const saveBtn = root.querySelector('[data-ig-action="save"]');
        const panel = root.querySelector('.lw-ig-comments');
        const list = root.querySelector('[data-ig-comment-list]');
        const form = root.querySelector('[data-ig-comment-form]');

        const paint = () => {
            const store = stateFor(slug);
            const entry = store[slug];
            if (likeBtn) likeBtn.setAttribute('aria-pressed', entry.liked ? 'true' : 'false');
            if (saveBtn) saveBtn.setAttribute('aria-pressed', entry.saved ? 'true' : 'false');
            renderMeta(root, baseLikes, baseComments, views, entry.extraLikes || 0, entry.comments.length);
            renderComments(list, entry.comments);
        };

        paint();

        likeBtn?.addEventListener('click', () => {
            const store = stateFor(slug);
            store[slug].liked = !store[slug].liked;
            store[slug].extraLikes = store[slug].liked ? 1 : 0;
            writeStore(store);
            likeBtn.classList.remove('is-pop');
            void likeBtn.offsetWidth;
            likeBtn.classList.add('is-pop');
            paint();
        });

        commentBtn?.addEventListener('click', () => {
            if (!panel) return;
            const canClose = !root.classList.contains('lw-article-engage');
            const isOpen = !panel.hidden && panel.classList.contains('is-open');
            if (isOpen && canClose) {
                panel.hidden = true;
                panel.classList.remove('is-open');
                commentBtn.setAttribute('aria-expanded', 'false');
                return;
            }
            panel.hidden = false;
            panel.classList.add('is-open');
            commentBtn.setAttribute('aria-expanded', 'true');
            panel.querySelector('input')?.focus();
        });

        shareBtn?.addEventListener('click', async () => {
            const media = root.querySelector('.lw-ig-post__media');
            const url = media
                ? new URL(media.getAttribute('href'), window.location.origin).href
                : window.location.href;
            try {
                if (navigator.share) {
                    await navigator.share({ title: document.title, url });
                } else if (navigator.clipboard) {
                    await navigator.clipboard.writeText(url);
                    shareBtn.setAttribute('aria-label', 'Link copied');
                    setTimeout(() => shareBtn.setAttribute('aria-label', 'Share this post'), 1600);
                }
            } catch {}
        });

        saveBtn?.addEventListener('click', () => {
            const store = stateFor(slug);
            store[slug].saved = !store[slug].saved;
            writeStore(store);
            paint();
        });

        form?.addEventListener('submit', (event) => {
            event.preventDefault();
            const input = form.querySelector('input');
            const text = (input?.value || '').trim();
            if (!text) return;
            const store = stateFor(slug);
            store[slug].comments.push({ name: 'You', text, at: Date.now() });
            writeStore(store);
            input.value = '';
            if (panel) {
                panel.hidden = false;
                panel.classList.add('is-open');
            }
            paint();
        });
    };

    document.querySelectorAll('.lw-ig-post, .lw-article-engage').forEach(bindRoot);
})();
