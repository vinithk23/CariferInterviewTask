@if (Session::has('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ Session("success") }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@elseif(Session::has('warning'))
<script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: '{{ Session("warning") }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif

{{--<script>--}}
{{--    function sweetAlert(data){--}}
{{--        Swal.fire({--}}
{{--            position: 'center',--}}
{{--            icon: data.icon,--}}
{{--            title: data.title,--}}
{{--            showConfirmButton: false,--}}
{{--            timer: 2000--}}
{{--        })--}}
{{--    }--}}
{{--</script>--}}
