 <!-- footer area start -->
 <footer class="pocket-footer">
     <div class="footer-container">

         <!-- Column 1 (UNCHANGED) -->
         <div class="footer-column">
             <h4>Core Features</h4>
             <ul>
                 <li><a href="  {{ url('core-features') }}tab=cloud" id="cloud">Cloud Desktop Environment</a></li>
                 <li><a href="{{ url('core-features') }}?tab=file">File Manager & Storage</a></li>
                 <li><a href="{{ url('core-features') }}?tab=window">Window-based Multitasking</a></li>
                 <li><a href="{{ url('core-features') }}?tab=launcher">App Launcher</a></li>
                 <li><a href="{{ url('core-features') }}?tab=drag">Drag & Drop UI</a></li>
                 <li><a href="{{ url('core-features') }}?tab=keyboard">Keyboard Shortcuts</a></li>
                 <li><a href="{{ url('core-features') }}?tab=sync">Multi-device Sync</a></li>
             </ul>
         </div>

         <!-- Column 2 -->
         <div class="footer-column">
             <h4>Collaboration</h4>
             <ul>
                 <li><a href="{{ url('collaboration') }}?tab=realtime">Real-time File Sharing</a></li>
                 <li><a href="{{ url('collaboration') }}?tab=workspace">Shared Workspaces</a></li>
                 <li><a href="{{ url('collaboration') }}?tab=permissions">Team Permissions</a></li>
                 <li><a href="{{ url('collaboration') }}?tab=activity">Activity Tracking</a></li>
             </ul>

             <h4>Security</h4>
             <ul>
                 <li><a href="{{ url('security') }}">Role-based Access</a></li>
                 <li><a href="{{ url('security') }}?tab=workspace">Backup & Recovery</a></li>
                 <li><a href="{{ url('security') }}?tab=permissions">Data Privacy Compliance</a></li>
             </ul>
         </div>

         <!-- Column 3 -->
         <div class="footer-column">
             <h4>Solutions</h4>
             <h5 class="footer-sub-heading">By Team Type</h5>


             <ul>
                 <li><a href="{{ url('team-type') }}?tab=remote">Remote Teams</a></li>
                 <li><a href="{{ url('team-type') }}?tab=startups">Startups</a></li>
                 <li><a href="{{ url('team-type') }}?tab=enterprises">Enterprises</a></li>
                 <li><a href="{{ url('team-type') }}?tab=freelancers">Freelancers</a></li>
             </ul>

             <h5 class="footer-sub-heading">By Use Case</h5>
             <ul>
                 <li><a href="{{ url('use-case') }}?tab=file-sharing">File Sharing</a></li>
                 <li><a href="{{ url('use-case') }}?tab=virtual-desktop">Virtual Desktop</a></li>
                 <li><a href="{{ url('use-case') }}?tab=team-workspaces">Team Workspaces</a></li>
                 <li><a href="{{ url('use-case') }}?tab=cloud-storage">Cloud Storage</a></li>
             </ul>
         </div>

         <!-- Column 4 -->


         <!-- Column 5 (UNCHANGED) -->
         <div class="footer-column">
             <h4>Resources</h4>
             <ul>
                 <li><a href="{{ url('documentation') }}">Documentation</a></li>
                 <li><a href="{{ url('faq') }}">FAQs</a></li>
                 <li><a href="{{ url('blog') }}">Updates</a></li>
                 <li><a href="{{ url('news') }}">Latest News</a></li>
             </ul>
         </div>

         <!-- Column 6 (UNCHANGED) -->
         <div class="footer-column">
             <h4>Company</h4>
             <ul>
                 <li><a href="{{ url('about') }}">About Us</a></li>
                 <li><a href="{{ url('careers') }}">Careers</a></li>
                 <li><a href="{{ url('contact-us') }}">Contact</a></li>
             </ul>
         </div>

         <div class="footer-column">
             <h4>Legal</h4>
             <ul>
                 <li><a href="{{ url('terms-condition') }}">Terms & Conditions</a></li>
                 <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                 <li><a href="{{ url('disclaimer') }}">Disclaimer</a></li>
             </ul>
         </div>

     </div>

     <!-- Bottom Section -->
     <div class="footer-bottom">
         <div class="social-icons">
             <a href="https://x.com/aibuzz_tech" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
             <a href="https://www.facebook.com/aibuzztech/" target="_blank"><i
                     class="fa-brands fa-facebook-f"></i></a>
             <a href="https://www.linkedin.com/company/aibuzz-techno/" target="_blank"><i
                     class="fa-brands fa-linkedin"></i></a>
             <a href="https://www.instagram.com/aibuzz_technoventures/" target="_blank"><i
                     class="fa-brands fa-instagram"></i></a>
         </div>

         <div class="copyright-text">
             © 2025 PocketOffice. All rights reserved.
         </div>
     </div>
 </footer>
 <!-- footer area end -->

 <!-- Scripts -->
 <script src="{{ asset($constants['JSFILEPATH'].'jquery-2.2.4.min.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'imagesloaded.pkgd.min.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'bootstrap.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'main.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'home.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'search-box.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'market-place-userLicense.js') }}"></script>
 <script src="{{ asset($constants['JSFILEPATH'].'pricing-page.js') }}"></script>


 <!-- <script src="{{ asset('public/assets/js/countries.js') }}"></script> -->
 <script src="{{ asset('public/assets/js/enquiry.js') }}"></script>

 <script src="{{ asset('public/assets/js/jquery.magnific-popup.js') }}"></script>
 <script src="{{ asset('public/assets/js/wow.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/jquery.cssslider.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/sales-enquiry-form.js') }}"></script>
 <!-- about us -->
 <script src="{{ asset('public/assets/js/products.js') }}"></script>
 <script src="{{ asset('public/assets/js/login.js') }}"></script>
 <!-- contact us -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
     integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
 <script src="{{ asset('public/assets/js/contact-us.js') }}"></script>
 <!-- team type -->
 <script src="{{ asset('public/assets/js/features-tab.js') }}"></script>
 <!-- consulting -->
 <script src="{{ asset('public/assets/js/documentation.js') }}"></script>
 <!-- pricing -->
 <!-- <script src="{{ asset('public/assets/js/pricing.js') }}"></script> -->
 <!-- blog -->
 <script src="{{ asset('public/assets/js/popper.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/waypoints.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/jquery.counterup.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/imagesloaded.pkgd.min.js.js') }}"></script>
 <script src="{{ asset('public/assets/js/isotope.pkgd.min.js') }}"></script>

 <script src="{{ asset('public/assets/js/jquery.nice-select.min.js') }}"></script>

 <script src="{{ asset('public/assets/js/worldmap-libs.js') }}"></script>
 <script src="{{ asset('public/assets/js/mediaelement.min.js') }}"></script>
 <script src="{{ asset('public/assets/js/blog-data.js') }}"></script>
 <script src="{{ asset('public/assets/js/blog.js') }}"></script>

 <!-- news -->
 <script src="{{ asset('public/assets/js/news.js') }}"></script>
 <!-- article -->
 <script src="{{ asset('public/assets/js/article-details.js') }}"></script>
 <!-- attribution -->
 <script src="{{ asset('public/assets/js/worldmap-topojson.js') }}"></script>
 <!-- blog details -->
 <script src="{{ asset('public/assets/js/blog-details.js') }}"></script>
 <!-- search result -->
 <script src="{{ asset('public/assets/js/search-result.js') }}"></script>


 <script>
     $('#serviceForm').on('submit', function(e) {

         e.preventDefault();

         let formData = new FormData(this);

         $.ajax({
             url: "{{ route('sales.enquiry.submit') }}",
             type: "POST",
             data: formData,
             processData: false,
             contentType: false,
             success: function(res) {

                 alert(res.message);

                 $('#serviceForm')[0].reset();

                 $('#sales-enquiry-overlay').hide();

             },
             error: function(err) {

                 console.log(err);

                 alert("Something went wrong");

             }

         });

     });
 </script>