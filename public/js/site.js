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
