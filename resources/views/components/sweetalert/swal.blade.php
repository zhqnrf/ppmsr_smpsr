@if ($errors->has('swalToast'))
    <script>
        let swalToastConfig = {!! json_encode($errors->get('swalToast')) !!}
        window.addEventListener('DOMContentLoaded', () => {
            const Toast = Swal.mixin({
                toast: true,
                position: swalToastConfig.position ?? 'top-end',
                showConfirmButton: false,
                timer: swalToastConfig.duration ?? 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: swalToastConfig.icon ?? alert('Mana swal iconnya?'),
                title: swalToastConfig.title ?? alert('Mana swal Titlenya?')
            });
        })
    </script>
@endif

@if ($errors->has('swal'))
    <script>
        let swalConfig = {!! json_encode($errors->get('swal')) !!}
        window.addEventListener('DOMContentLoaded', () => {
            const Toast = Swal.mixin({
                toast: true,
                position: swalConfig.position ?? 'top-end',
                showConfirmButton: false,
                timer: swalConfig.duration ?? 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: swalConfig.icon ?? alert('Mana swal iconnya?'),
                title: swalConfig.title ?? alert('Mana swal Titlenya?')
            });
        })
    </script>
@endif
