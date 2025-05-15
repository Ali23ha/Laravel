<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Vps Hosting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />
</head>
<body style="background-color: #2a2b3c">
<header class="header-bar mb-3" style="background-color: #2a2b3c">
    <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="{{route('home-page')}}" class="text-white">VPS Hosting</a></h4>

            <form action="{{route('New-Login')}}" method="POST" class="mb-0 pt-2 pt-md-0">
                @csrf
                <div class="row align-items-center">
                    <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                        <input name="email" class="form-control form-control-sm input-dark" type="text" placeholder="Email" autocomplete="off" />
                    </div>
                    <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                        <input name="password" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                    </div>
                    <div class="col-md-auto">
                        <button class="btn btn-primary btn-sm">Sign In</button>
                    </div>
                </div>
            </form>




    </div>
</header>
<!-- header ends here -->
<div >
    <div class="row row-cols-lg-2 row-cols-sm-1" style="font-family:apple-system, system-ui, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif">
        <div>
            <h1 style="margin-left: 15px;color: #e1e4e7">VPS Hosting in the Cloud: Cost Efficiency Server Plans</h1>
            <p class="fs-mid" style="margin-left: 22px">
                <strong style="color: #0275d8ed !important; font-size: 20px">Our Virtual Private Server (VPS) plans are available in over 20 locations worldwide with 24/7 expert support. We use advanced technology for fast and secure hosting with high performance. </strong>
                <img class="header-img sm-show" style="width: 950px;height: 450px;float: right"  src="{{asset('images/server-os-templates (1).svg')}}" alt="Operating System Distros"/>
        </div>

    </div>
    <button class="btn btn-fw white rounded" style="margin-left: 29px;margin-top: -577px; " type="submit">
        <a href="{{route('Services-Index')}}">
            <p  class="rounded" style="font-size: 25px;margin-top: 10px;color: black">See Our Plans</p>
        </a>
    </button>

<!-- footer begins -->
<footer class="border-top text-center small text-muted py-3">
    <p class="m-0">Copyright &copy; 2022 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    $('[data-toggle="tooltip"]').tooltip()
</script>
</body>
</html>
