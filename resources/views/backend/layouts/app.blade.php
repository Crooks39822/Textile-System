<!DOCTYPE html>
<html lang="en">
    @include('backend.layouts._header')

    @include('backend.layouts._sidebar')
    @yield('style')

    @yield('content')

    @include('backend.layouts._footer')


    <aside class="control-sidebar control-sidebar-dark">

      </aside>

    </div>

    @include('backend.layouts._scripts')


    @yield('script')

    <script>
        function notify(message, delay = null) {
            if(delay) {
                delay = delay
            } else {
                delay = 3000
            }

            $('#wrapper_1').append(`
            <div id="notification_wrapper" class="p-4 bg-success rounded-lg col-md-12" style="position:absolute; bottom:10px; left:260px">
                <div id="close_notify" class="close text-danger text-right">X</div>
                <div class="">${message}</div>
            </div>`)

            setTimeout(() => {
                $('#notification_wrapper').remove()
            }, delay);
        }

        $(document).on('click','#close_notify', function () {
            $('#notification_wrapper').remove()
        })

    </script>
    </body>
    </html>
