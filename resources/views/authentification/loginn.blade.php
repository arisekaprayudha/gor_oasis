
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="0xacPalCZxTKY9APBcxVCn5ALYkrdWgWM17kz4Jk">

    <title>Arsip JMTM</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://57732-cdc7b01cbf82f8bb.quickadminpanel.com/css/custom.css" rel="stylesheet" />
    </head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    <div class="c-app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <img class="mb-4" src="images/logo.png" alt="" width="405" height="107">
                <h1 class="text-center">ARSIP JMTM</h1> <br/>

                {{-- <p class="text-center fs-4">ARSIP JMTM</p> --}}

                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <input type="hidden" name="_token" value="0xacPalCZxTKY9APBcxVCn5ALYkrdWgWM17kz4Jk"> --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="username" name="nip" type="text" class="form-control" autofocus placeholder="username" value="">

                                            </div>

                     {{-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-briefcase"></i>
                            </span>
                        </div>

                        <select class="form-control">
                            <option value="">Unit Kerja</option>
                            <option value="">Arsip</option>
                            <option value="">Logistik</option>
                            <option value="">Keuangan</option>
                        </select>

                                            </div> --}}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control" required placeholder="Password">

                                            </div>

                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-grid gap-2 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
    </body>

</html>

