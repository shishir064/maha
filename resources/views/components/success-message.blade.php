{{-- Normal Laravel session success --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: false,
                title: @json(session('success')),

                showConfirmButton: true,
                confirmButtonText: 'DISMISS',
                buttonsStyling: false,

                customClass: {
                    popup: 'swal-snackbar',
                    confirmButton: 'swal-snackbar-btn',
                },

                timer: 2000,
                timerProgressBar: false,
            });
        });
    </script>
@endif

{{-- Livewire success notification --}}
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('show-success', (event) => {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: false,
                title: event.message,

                showConfirmButton: true,
                confirmButtonText: 'DISMISS',
                buttonsStyling: false,

                customClass: {
                    popup: 'swal-snackbar',
                    confirmButton: 'swal-snackbar-btn',
                },

                timer: 2000,
                timerProgressBar: false,
            });
        });
    });
</script>