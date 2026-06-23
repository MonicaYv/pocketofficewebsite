import './bootstrap';

// 1. Load jQuery first and immediately bind it globally
import $ from 'jquery';
window.jQuery = $;
window.$ = $;

// 2. Import your packages (They will now safely see window.jQuery)
import imagesLoaded from 'imagesloaded';
import Isotope from 'isotope-layout';
import 'slick-carousel'; 
import 'magnific-popup';
import 'magnific-popup/dist/magnific-popup.css';
// Make imagesLoaded available as a jQuery plugin if your code expects it that way
imagesLoaded.makeJQueryPlugin($);

// 3. Initialize your scripts safely when the DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    console.log("All systems loaded via app.js bundle!");
    
    // Your slick, isotope, and page-specific initializations go here safely...
});