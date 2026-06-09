/**
 * Kejari Palu - Main JS
 */

document.addEventListener('DOMContentLoaded', function () {

  // ── Sticky nav shadow saat scroll ──
  const nav = document.getElementById('main-nav');
  window.addEventListener('scroll', () => {
    if (nav) nav.classList.toggle('scrolled', window.scrollY > 10);
  });

  // ── Mobile menu toggle ──
  const toggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  if (toggle && mobileMenu) {
    toggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
      // Animasi hamburger → X
      const spans = toggle.querySelectorAll('span');
      toggle.classList.toggle('open');
      if (toggle.classList.contains('open')) {
        spans[0].style.transform = 'rotate(45deg) translate(4px, 5px)';
        spans[1].style.opacity = '0';
        spans[2].style.transform = 'rotate(-45deg) translate(4px, -5px)';
      } else {
        spans[0].style.transform = '';
        spans[1].style.opacity = '';
        spans[2].style.transform = '';
      }
    });
  }

  // ── Smooth scroll untuk anchor link ──
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ── Ticker berita berhenti saat hover ──
  const ticker = document.querySelector('.ticker-content');
  if (ticker) {
    ticker.addEventListener('mouseenter', () => ticker.style.animationPlayState = 'paused');
    ticker.addEventListener('mouseleave', () => ticker.style.animationPlayState = 'running');
  }

  // ── Fade in saat scroll ──
  const fadeEls = document.querySelectorAll('.fade-on-scroll');
  if (fadeEls.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => observer.observe(el));
  }

});

// ── Ticker CSS (injected) ──
const style = document.createElement('style');
style.textContent = `
  .ticker-wrap { overflow: hidden; }
  .ticker-content { display: inline-flex; animation: ticker 32s linear infinite; white-space: nowrap; }
  @keyframes ticker { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
  .fade-on-scroll { opacity: 0; transform: translateY(20px); transition: opacity .6s ease, transform .6s ease; }
  .fade-on-scroll.visible { opacity: 1; transform: translateY(0); }
  @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.4} }
`;
document.head.appendChild(style);
