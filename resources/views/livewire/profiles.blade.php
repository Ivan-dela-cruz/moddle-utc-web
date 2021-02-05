<div>

    @if(\Illuminate\Support\Facades\Auth::user()->student)
        @include('admin.dashboard.profiles.student')
    @elseif(\Illuminate\Support\Facades\Auth::user()->teacher)
        @include('admin.dashboard.profiles.teacher')
    @else
        @include('admin.dashboard.profiles.admin')
    @endif

    @section('scripts')
        <script>
            // [ customer-scroll ] start
            var px = new PerfectScrollbar('.cust-scroll', {
                wheelSpeed: .5,
                swipeEasing: 0,
                wheelPropagation: 1,
                minScrollbarLength: 40,
            });

            // [ customer-scroll ] end
            function changeProfile() {
                $('#photo_profile').click();
            }

            $('#photo_profile').change(function () {
                var imgPath = this.value;
                var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                    readURL(this);
                    setTimeout(function () {
                        $('#loading').removeClass('spinner-grow');
                        $('#updatePhotoBtn').click();
                    }, 2000)
                } else {
                    notify('Elija imágenes (jpg, jpeg, png).', 'danger');
                }
            });


            function readURL(input) {
                if (input.files && input.files[0]) {
                    if (input.files[0].size > 2048576) {
                        notify('El tamaño permitido de las imágenes es de 2MB.', 'warning');
                    } else {
                        var reader = new FileReader();
                        reader.readAsDataURL(input.files[0]);
                        reader.onload = function (e) {
                            $('#preview').attr('src', e.target.result);
                            $('#loading').addClass('spinner-grow');
                        };
//                $("#remove").val(0);
                    }
                }
            }

            function removeImage() {
                $('#preview').attr('src', '{{asset('img/user.jpg')}}');
                $('#removePhotoBtn').click()
//            $("#remove").val(1);
            }


        </script>


    @endsection
</div>
