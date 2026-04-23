
// Get all sidebar navigation links
const navLinks = document.querySelectorAll('.docs-sidebar a');

// Add click event to each link
navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default jump
        
        // Get the target section id (remove the # from href)
        const targetId = this.getAttribute('href').substring(1);
        
        // Find the target section
        const targetSection = document.getElementById(targetId);
        
        // Smooth scroll to the section
        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});
