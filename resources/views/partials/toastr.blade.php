 <script>
     toastr.options = {
         "closeButton": true,
         "progressBar": true,
         "positionClass": "toast-top-left", // 👈 top-left
         "timeOut": "4000"
     }

     @if (session('status-success'))
         toastr.success("{{ session('status-success') }}");
     @endif

     @if (session('status-error'))
         toastr.error("{{ session('status-error') }}");
     @endif

     @if (session('status-warning'))
         toastr.warning("{{ session('status-warning') }}");
     @endif

     @if (session('status-info'))
         toastr.info("{{ session('status-info') }}");
     @endif
 </script>
