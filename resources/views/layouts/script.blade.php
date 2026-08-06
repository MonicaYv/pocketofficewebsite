<!-- resources/views/layouts/script.blade.php -->

<!-- 1. Global CDN Dependencies loaded after initial paint -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@vite(['resources/js/main.js', 'resources/js/enquiry.js','resources/js/sales-enquiry-form.js','resources/js/countries.js',])
<script>
    let enquiryUrl = "{{ route('sales.enquiry.submit') }}";
</script>

