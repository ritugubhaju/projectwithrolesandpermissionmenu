<!-- JAVASCRIPT -->
        {{-- <script src="assets/libs/jquery/jquery.min.js"></script> --}}
        <script src="{{asset('js/jquery.min.js')}} "></script>


        {{-- <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
        <script src="{{asset('js/bootstrap.bundle.min.js')}} "></script>

        {{-- <script src="assets/libs/metismenu/metisMenu.min.js"></script> --}}
        <script src="{{asset('js/metisMenu.min.js')}} "></script>

        {{-- <script src="assets/libs/simplebar/simplebar.min.js"></script> --}}
        <script src="{{asset('js/simplebar.min.js')}} "></script>


        {{-- <script src="assets/libs/node-waves/waves.min.js"></script> --}}
        {{-- <script src="{{asset('js/waves.min.js')}} "></script> --}}

        {{-- <script src="assets/js/pages/dashboard.init.js"></script> --}}
        {{-- <script src="{{asset('js/dashboard.init.js')}}"></script> --}}

        <!-- Sweet alert init js-->
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>

        {{-- <script src="assets/js/app.js"></script> --}}
        <script src="{{asset('js/app.js')}}"></script>

        {{-- Select2 --}}
        <script src="{{asset('js/select2.min.js')}}"></script>

        <script src="{{asset('js/scripts.js')}}"></script>

        <script src="{{ asset('js/toastr/toastr.js') }}"></script>

        <script src="{{asset('js/jquery.repeater.min.js')}}"></script>

        <script src="{{asset('js/form-repeater.init.js')}}"></script>

        {{-- <script>
            $(function () {
                $('.my-ckeditor').each(function (e) {
                    CKEDITOR.replace(this.id, {
                        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                });
            });
        </script> --}}

        <script>
            function deleteThis(obj) {
                let data= obj.getAttribute("link");
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = data;
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                } else {
                    Swal.fire(
                    'Cancelled!',
                    'Your file has been Cancelled.',
                    'error'
                    )
                }
                })
            }
        </script>

        @yield('page-specific-scripts')
        {!! Toastr::message() !!}



    </body>
</html>
