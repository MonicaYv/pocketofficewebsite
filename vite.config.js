import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/customer-login.css',
                'resources/css/bootstrap.min.css', 
                'resources/css/font-awesome.min.css', 
                'resources/css/themify-icons.css', 
                'resources/css/magnific-popup.css', 
                'resources/css/style.css', 
                'resources/css/enquiry.css', 
                'resources/css/responsive.css', 
                'resources/css/animate.css', 
                'resources/css/owl.carousel.min.css', 
                'resources/css/line-awesome.min.css', 
                'resources/css/flaticon.css', 
                'resources/css/nice-select.css', 
                'resources/css/animated-slider.css', 
                'resources/css/login.css', 
                'resources/css/slick.css',
                'resources/js/app.js',
                'resources/js/main.js',
                'resources/js/home.js',
                'resources/js/enquiry.js',
                'resources/js/sales-enquiry-form.js',
                'resources/js/products.js',
                'resources/js/login.js',
                'resources/js/contact-us.js',
                'resources/js/blog.js',
                'resources/js/news.js',
                'resources/js/countries.js',
                'resources/js/pricing.js',
                'resources/js/payment.js',
                'resources/js/docs-login.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
        
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
