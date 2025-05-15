<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Test</title>

    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src=" https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href=" https://fonts.googleapis.com" />
    <link rel="preconnect" href=" https://fonts.gstatic.com" crossorigin />
    <link href=" https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('main.css')}}" />
    <link href=" https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Toastr CSS -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jQuery -->
    <script src=" https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Toastr JavaScript -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Pusher JavaScript -->
    <script src=" https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <style>
            /* Custom style for Toastr notifications */

            .toast-info .toast-message {
                display: flex;
                align-items: center;

            }
            .toast-info .toast-message i {
                margin-right: 10px;

            }
            .toast-info .toast-message .notification-content {
                display: flex;
                flex-direction: row;
                align-items: center;

            }
        </style>
        <script>
            Pusher.logToConsole = true;

            // Initialize Pusher
            var pusher = new Pusher('0ea218f8d17b46d59d0a', {
                cluster: 'ap2'
            });

            // Subscribe to the channel
            var channel = pusher.subscribe('notification');

            // Bind to the event
            channel.bind('test.notification', function(data) {
                console.log('Received data:', data); // Debugging line

                // Display Toastr notification with icons and inline content
                if (data.post_id && data.user_id) {
                    toastr.info(
                    `<div class="notification-content" >
                        <i class="fas fa-user" ></i> <span>   ${data.post_id}</span>
                        <i class="fas fa-book" style="margin-left: 20px;"></i> <span>  ${data.user_id}</span>
                    </div>`,
                        'New Report Notification',
                        {
                            closeButton: true,
                            progressBar: true,
                            timeOut: 0, // Set timeOut to 0 to make it persist until closed
                            extendedTimeOut: 0, // Ensure the notification stays open
                            positionClass: 'toast-top-right',
                            enableHtml: true

                        },

                    );
                } else {
                    console.error('Invalid data received:', data);
                }
            });

            // Debugging line
            pusher.connection.bind('connected', function() {
                console.log('Pusher connected');
            });
        </script>

</head>
<body>

<!-- header ends here -->
<p hidden>
    <code >notification</code>
    <code>test.notification</code>
</p>
@yield('content')

<!-- footer begins -->

<footer class="border-top text-center small text-muted py-3">
    <p class="m-0">Copyright &copy; 2024 <a href="/" class="text-muted">Test</a>. All rights reserved.</p>
</footer>

<script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src=" https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>
<script src=" https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>
</html>
