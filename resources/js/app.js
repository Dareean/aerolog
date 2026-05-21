import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.documentElement.classList.add('js');

const gsapCdnUrls = [
	'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js',
	'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js',
];

function loadScript(src) {
	return new Promise((resolve, reject) => {
		const existing = document.querySelector(`script[src="${src}"]`);
		if (existing) {
			if (existing.dataset.loaded === 'true') {
				resolve();
				return;
			}

			existing.addEventListener('load', () => resolve(), { once: true });
			existing.addEventListener('error', () => reject(new Error(`Failed to load ${src}`)), { once: true });
			return;
		}

		const script = document.createElement('script');
		script.src = src;
		script.async = true;
		script.onload = () => {
			script.dataset.loaded = 'true';
			resolve();
		};
		script.onerror = () => reject(new Error(`Failed to load ${src}`));
		document.head.appendChild(script);
	});
}

function setupFallbackAnimations() {
	const revealItems = document.querySelectorAll('[data-reveal], [data-page-shell]');
	revealItems.forEach((item) => item.classList.add('is-visible'));

	document.querySelectorAll('[data-typewriter]').forEach((typewriter) => {
		const phrases = JSON.parse(typewriter.getAttribute('data-typewriter') || '[]');
		if (!phrases.length) return;
		typewriter.textContent = phrases[0];
	});
}

function setupGsapAnimations() {
	const { gsap, ScrollTrigger } = window;
	if (!gsap) {
		setupFallbackAnimations();
		return;
	}

	try {
		const timing = {
			shellDuration: 0.42,
			shellDelay: 0,
			revealDuration: 0.42,
			revealStagger: 0.02,
			typingSpeed: 0.025,
			deletingSpeed: 0.015,
			pauseAfterTyping: 0.7,
			pauseAfterDeleting: 0.12,
		};

		if (ScrollTrigger) {
			gsap.registerPlugin(ScrollTrigger);
		}

		gsap.set('[data-page-shell]', { opacity: 0, y: 18 });
		gsap.to('[data-page-shell]', {
			opacity: 1,
			y: 0,
			duration: timing.shellDuration,
			ease: 'power2.out',
			delay: timing.shellDelay,
			stagger: timing.revealStagger,
		});

		const revealTargets = gsap.utils.toArray('[data-reveal]');
		revealTargets.forEach((target, index) => {
			gsap.fromTo(target, {
				opacity: 0,
				y: 18,
			}, {
				opacity: 1,
				y: 0,
				duration: timing.revealDuration,
				ease: 'power2.out',
				delay: index < 2 ? index * 0.02 : 0,
				scrollTrigger: ScrollTrigger ? {
					trigger: target,
					start: 'top 82%',
					toggleActions: 'play none none none',
				} : undefined,
			});
		});

		if (ScrollTrigger) {
			gsap.utils.toArray('[data-parallax]').forEach((target) => {
				const speed = Number(target.getAttribute('data-parallax-speed') || '12');
				const direction = target.getAttribute('data-parallax-direction') === 'down' ? 1 : -1;

				gsap.fromTo(target, {
					y: direction * speed,
				}, {
					y: direction * -speed,
					ease: 'none',
					scrollTrigger: {
						trigger: target,
						start: 'top bottom',
						end: 'bottom top',
						scrub: true,
					},
				});
			});
		}

		const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

		document.querySelectorAll('[data-typewriter]').forEach((typewriter) => {
			const phrases = JSON.parse(typewriter.getAttribute('data-typewriter') || '[]');
			if (!phrases.length) return;

			if (prefersReducedMotion) {
				typewriter.textContent = phrases[0];
				return;
			}

			const state = { phraseIndex: 0, charIndex: 0 };
			const typingSpeed = timing.typingSpeed;
			const deletingSpeed = timing.deletingSpeed;
			const pauseAfterTyping = timing.pauseAfterTyping;
			const pauseAfterDeleting = timing.pauseAfterDeleting;

			const typeNext = () => {
				const currentPhrase = phrases[state.phraseIndex];
				const isDeleting = state.charIndex > currentPhrase.length;
				const visibleLength = isDeleting
					? Math.max(0, currentPhrase.length - (state.charIndex - currentPhrase.length))
					: state.charIndex;

				typewriter.textContent = currentPhrase.slice(0, visibleLength);

				if (!isDeleting && visibleLength === currentPhrase.length) {
					gsap.delayedCall(pauseAfterTyping, () => {
						state.charIndex = currentPhrase.length + 1;
						typeNext();
					});
					return;
				}

				if (isDeleting && visibleLength === 0) {
					gsap.delayedCall(pauseAfterDeleting, () => {
						state.phraseIndex = (state.phraseIndex + 1) % phrases.length;
						state.charIndex = 0;
						typeNext();
					});
					return;
				}

				state.charIndex += 1;
				gsap.delayedCall(isDeleting ? deletingSpeed : typingSpeed, typeNext);
			};

			typeNext();
		});
	} catch (error) {
		console.error('AeroLog animation init failed:', error);
		setupFallbackAnimations();
	}
}

function initAnimations() {
	if (window.gsap) {
		setupGsapAnimations();
		return;
	}

	loadScript(gsapCdnUrls[0])
		.then(() => loadScript(gsapCdnUrls[1]))
		.then(setupGsapAnimations)
		.catch(() => setupFallbackAnimations());
}

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initAnimations, { once: true });
} else {
	initAnimations();
}

Alpine.start();
