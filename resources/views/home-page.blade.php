@extends('layout.template')
@section('title','HOME PAGE')

@section('content')

@if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-teal"><i class="fa fa-mortar-board"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Total Training</span>
            <span class="info-box-number">{{ $total_training }} <small>Course</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Total User</span>
            <span class="info-box-number">{{ $total_user }} <small>Peson</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-maroon"><i class="fa fa-rocket"></i></span>
  
          <div class="info-box-content">
              <span class="info-box-text">Total Lesson</span>
              <span class="info-box-number">{{ $total_lesson }} <small>Unit</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-plane"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Total Approval</span>
            <span class="info-box-number">{{ $total_approval }} <small>Unit</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
</div>
@endif
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Home Page</h3>
    </div>
    
        @if($password == true)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Change Password!</h4>
            Your password is still the default, please change the password 
            <a type="button" data-toggle="modal" data-target="#modal-default">here</a>
        </div>

        <!-- modal change password -->
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.changePassword')}}" method="post">
                        @csrf
                        @method('PUT')

                        {{-- @foreach ($errors->all() as $error)

                        <p class="text-danger">{{ $error }}</p>

                        @endforeach  --}}

                        <div class="form-group {{$errors->has('password') ? ' has-error' : ' '}}">
                            <label for="password">Old Password :</label>
                            <input id="password" type="password" placeholder="Old Password" class="form-control" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                        <div class="form-group {{$errors->has('newPassword') ? ' has-error' : ' '}}">
                            <label for="newPassword">New Password :</label>
                            <input id="newPassword" placeholder="New Password" type="password" class="form-control" name="newPassword" value="{{ old('newPassword') }}">
                            @if ($errors->has('newPassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('newPassword') }}</strong>
                                </span>
                            @endif
                            
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                            <span class=" form-control-feedback"></span>
                        </div>
                        
                        {{-- <div class="form-group has-feedback">
                            <label for="password">Confirmation New Password :</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div> 
                        </form>
                </div>
            </div>
        </div>
    @endif
    {{-- /change password --}}

    {{-- <div class="clearfix"> --}}
    <div class="box-body table-responsive">
        <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Status Training</th>
                <th>Title Training</th>
                <th>Mandatory Training</th>
                <th>Method Training</th>
                {{-- <th>Venue</th>
                <th>Room</th> --}}
                <th>Registration Date</th>
                <th>Quota</th>
                <th class="text-center">Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($training as $item)
            @if($item->publish == "yes")
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                @if($item->endDate < $date)
                <td><label class="label label-danger">PENDAFTARAN TUTUP</label></td>
                @else
                <td><label class="label label-success">PENDAFTARAN AKTIF</label></td>
                @endif
                <td>{{ $item->approval->titleTraining }}</td>
                <td>{{ $item->mandatoryTraining }}</td>
                <td>{{ $item->methodTraining }}</td>
                {{-- <td>{{ $item->venue->nameVenue }}</td>
                <td>{{ $item->room->nameRoom }}</td> --}}
                <td>{{ $item->startDate }} s.d {{ $item->endDate }}</td>
                <td>
                    <?php $quota = 0;?>
                    @foreach($registTrainings as $rt)
                        @if($rt->training_id == $item->id AND $rt->regist->status_tiga == 1)
                            <?php $quota++;?>
                        @endif
                    @endforeach
                    {{$quota}} / {{ $item->quota }}
                </td>
                <td class="text-center">
                    {{-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#editmodal">
                        <i class="fa fa-pencil"></i> Edit
                    </button> --}}
                    <a href="/regist/{{$item->id}}/create" class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i>
                    </a>
    
                </td>
            </tr>
            @endif
            @endforeach
        </tbody> 
    </table>
    {{-- </div> --}}
</div>

@endsection