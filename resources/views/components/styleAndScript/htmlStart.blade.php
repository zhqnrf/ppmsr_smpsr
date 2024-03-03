{{--
*=======================
*   Bootstrap Basic
*=======================
--}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
{{-- *===============* --}}
{{--
*============================================================================
*                             | Bootstrap popper |
*   Jika Kamu tidak berencana menggunakan dropdown, popover, atau tooltip,
*   hemat beberapa kilobyte dengan tidak menyertakan Popper.
*============================================================================
--}}
@if (isset($htmlStart))
    @if ($htmlStart['bs-popper'] ?? false)
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    @endif
    @if (($htmlStart['bs-icons'] ?? false) || ($htmlStart['bs-icon'] ?? false))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @endif
@endif
{{-- *===============* --}}


<style>
    :root {
        ---root-color-red: #760712;
        ---root-color-brown: #e0cc8d;
    }
</style>
