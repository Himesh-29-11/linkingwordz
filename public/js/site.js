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
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const savedKey = 'lw-blog-saved';
    const readSaved = () => {
        try { return JSON.parse(localStorage.getItem(savedKey) || '{}') || {}; } catch { return {}; }
    };

    const jsonFetch = async (url, options = {}) => {
        const res = await fetch(url, {
            headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': csrf,
                'X-Requested-With': 'XMLHttpRequest',
                ...(options.body ? { 'Content-Type': 'application/json' } : {}),
            },
            ...options,
        });
        if (!res.ok) throw new Error('request failed');
        return res.json();
    };

    const escapeHtml = (value) => String(value || '').replace(/[&<>]/g, (ch) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[ch]));

    const renderComments = (list, comments) => {
        if (!list) return;
        const rich = list.classList.contains('lw-talk__list');
        list.innerHTML = (comments || []).map((item) => {
            const name = escapeHtml(item.name || 'Guest');
            const text = escapeHtml(item.text || '');
            const date = escapeHtml(item.date || '');
            if (!rich) {
                return `<li><b>${name}</b> ${text}</li>`;
            }
            const initial = escapeHtml((item.name || 'G').trim().charAt(0).toUpperCase() || 'G');
            return `<li class="lw-talk__item">
                <span class="lw-talk__avatar" aria-hidden="true">${initial}</span>
                <article class="lw-talk__bubble">
                    <header class="lw-talk__who"><strong>${name}</strong>${date ? `<time>${date}</time>` : ''}</header>
                    <p>${text}</p>
                </article>
            </li>`;
        }).join('');
    };

    const bindRoot = (root) => {
        const actions = root.matches('[data-post-slug]') ? root : root.querySelector('[data-post-slug]');
        if (!actions) return;

        const slug = actions.dataset.postSlug;
        let likes = Number(actions.dataset.likes || 0);
        let comments = Number(actions.dataset.comments || 0);
        let shares = Number(actions.dataset.shares || 0);
        let views = Number(actions.dataset.views || 0);
        let liked = false;
        const likeBtn = root.querySelector('[data-ig-action="like"]');
        const commentBtn = root.querySelector('[data-ig-action="comment"]');
        const shareBtn = root.querySelector('[data-ig-action="share"]');
        const saveBtn = root.querySelector('[data-ig-action="save"]');
        const panel = root.querySelector('.lw-ig-comments');
        const list = root.querySelector('[data-ig-comment-list]');
        const form = root.querySelector('[data-ig-comment-form]');
        const meta = root.querySelector('[data-ig-meta]');
        let loadedComments = [];

        const paint = () => {
            if (likeBtn) likeBtn.setAttribute('aria-pressed', liked ? 'true' : 'false');
            if (saveBtn) saveBtn.setAttribute('aria-pressed', readSaved()[slug] ? 'true' : 'false');
            if (meta) meta.textContent = `${likes} likes · ${comments} comments · ${shares} shares`;
            renderComments(list, loadedComments);
        };

        jsonFetch(`/blog/${encodeURIComponent(slug)}/comments`)
            .then((data) => {
                likes = data.likes ?? likes;
                comments = data.comment_count ?? data.comments_count ?? comments;
                shares = data.shares ?? shares;
                views = data.views ?? views;
                liked = !!data.liked;
                loadedComments = Array.isArray(data.comments) ? data.comments : loadedComments;
                paint();
            })
            .catch(() => paint());

        likeBtn?.addEventListener('click', async () => {
            try {
                const data = await jsonFetch(`/blog/${encodeURIComponent(slug)}/like`, { method: 'POST' });
                liked = !!data.liked;
                likes = data.likes ?? likes;
                comments = data.comment_count ?? comments;
                shares = data.shares ?? shares;
                views = data.views ?? views;
                likeBtn.classList.remove('is-pop');
                void likeBtn.offsetWidth;
                likeBtn.classList.add('is-pop');
                paint();
            } catch {}
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
            panel.querySelector('textarea, input')?.focus();
        });

        shareBtn?.addEventListener('click', async () => {
            const media = root.querySelector('.lw-ig-post__media');
            const url = media
                ? new URL(media.getAttribute('href'), window.location.origin).href
                : window.location.href;
            try {
                if (navigator.share) await navigator.share({ title: document.title, url });
                else if (navigator.clipboard) {
                    await navigator.clipboard.writeText(url);
                    shareBtn.setAttribute('aria-label', 'Link copied');
                    setTimeout(() => shareBtn.setAttribute('aria-label', 'Share this post'), 1600);
                }
            } catch {}
        });

        saveBtn?.addEventListener('click', () => {
            const store = readSaved();
            store[slug] = !store[slug];
            localStorage.setItem(savedKey, JSON.stringify(store));
            paint();
        });

        form?.addEventListener('submit', async (event) => {
            event.preventDefault();
            const input = form.querySelector('textarea, input');
            const text = (input?.value || '').trim();
            if (!text) return;
            try {
                const data = await jsonFetch(`/blog/${encodeURIComponent(slug)}/comments`, {
                    method: 'POST',
                    body: JSON.stringify({ comment: text, name: 'You' }),
                });
                if (data.comment) loadedComments.push(data.comment);
                comments = data.comments ?? comments;
                input.value = '';
                if (panel) {
                    panel.hidden = false;
                    panel.classList.add('is-open');
                    if (data.pending) {
                        let note = panel.querySelector('[data-ig-pending]');
                        if (!note) {
                            note = document.createElement('p');
                            note.dataset.igPending = '1';
                            note.style.margin = '0 0 0.6rem';
                            note.style.fontSize = '0.8rem';
                            note.style.color = '#af929d';
                            panel.insertBefore(note, form);
                        }
                        note.textContent = 'Thanks — your comment is waiting for review.';
                    }
                }
                paint();
            } catch {}
        });
    };

    document.querySelectorAll('.lw-ig-post, .lw-article-engage').forEach(bindRoot);
})();

(() => {
    document.querySelectorAll('[data-ig-carousel]').forEach((root) => {
        const track = root.querySelector('.lw-ig-carousel__track');
        const slides = [...root.querySelectorAll('.lw-ig-carousel__slide')];
        const dotsWrap = root.querySelector('[data-ig-dots]');
        const prev = root.querySelector('[data-ig-prev]');
        const next = root.querySelector('[data-ig-next]');
        if (!track || slides.length === 0) return;

        let index = 0;
        let timer = null;
        const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const perView = () => {
            if (window.matchMedia('(max-width: 700px)').matches) return 1;
            if (window.matchMedia('(max-width: 1024px)').matches) return 2;
            return 3;
        };

        const pageCount = () => Math.max(1, Math.ceil(slides.length / perView()));

        const paint = () => {
            const pages = pageCount();
            index = ((index % pages) + pages) % pages;
            const start = index * perView();
            const slide = slides[0];
            const gap = parseFloat(getComputedStyle(track).gap) || 0;
            const step = slide.getBoundingClientRect().width + gap;
            track.style.transform = `translateX(-${start * step}px)`;
            if (dotsWrap) {
                dotsWrap.innerHTML = '';
                for (let i = 0; i < pages; i += 1) {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'lw-ig-carousel__dot' + (i === index ? ' is-on' : '');
                    btn.setAttribute('aria-label', `Show page ${i + 1}`);
                    btn.addEventListener('click', () => { index = i; paint(); restart(); });
                    dotsWrap.appendChild(btn);
                }
            }
        };

        const go = (dir) => {
            index += dir;
            paint();
        };

        let hovered = false;
        const videoPlaying = () => [...root.querySelectorAll('video')].some((v) => !v.paused && !v.ended);
        const stop = () => { if (timer) window.clearInterval(timer); timer = null; };
        const start = () => {
            stop();
            if (reduce || hovered || videoPlaying() || pageCount() < 2) return;
            timer = window.setInterval(() => go(1), 4000);
        };
        const restart = () => start();

        prev?.addEventListener('click', () => { go(-1); restart(); });
        next?.addEventListener('click', () => { go(1); restart(); });
        root.addEventListener('pointerenter', () => { hovered = true; stop(); });
        root.addEventListener('pointerleave', () => { hovered = false; start(); });
        root.addEventListener('focusin', () => { hovered = true; stop(); });
        root.addEventListener('focusout', () => { hovered = false; start(); });
        window.addEventListener('resize', paint);
        root.querySelectorAll('video').forEach((video) => {
            video.addEventListener('play', stop);
            video.addEventListener('pause', start);
            video.addEventListener('ended', start);
        });

        paint();
        start();
    });
})();
