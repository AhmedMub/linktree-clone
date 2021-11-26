<script>
@if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";

    // Global Options
    toastr.options = {
        "positionClass": "toast-top-left",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
    }
    setTimeout(() => {
        switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        }
    }, 600);
@endif
</script>
