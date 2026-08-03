import './bootstrap';

// 1. Load jQuery first and immediately bind it globally
import $ from 'jquery';
window.jQuery = $;
window.$ = $;

// Keep the base bundle lean; route-specific pages load their own UI libraries.
document.addEventListener('DOMContentLoaded', () => {
    // Intentionally lightweight. Page-specific behaviors live in route bundles.
});
