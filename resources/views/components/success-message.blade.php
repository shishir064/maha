{{-- Normal Laravel session success message --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
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
                position: 'top-end',
                icon: 'success',
                title: event.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        });
    });
</script>