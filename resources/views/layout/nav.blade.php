@extends('layout.template')
@section('title','Training')
@section('content')
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#pretest" data-toggle="tab">PreTest</a></li>
        <li><a href="#modul" data-toggle="tab">Modul</a></li>
        <li><a href="#forum" data-toggle="tab">Forum</a></li>
        <li><a href="#posttest" data-toggle="tab">PostTest</a></li>
        <li><a href="#evaluasi" data-toggle="tab">Evaluasi</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="pretest">
            <div class="panel-body">
            @if($training->endDatePretest  <= now())
            <p style="color:red;"> time is up, next time try to be on time </p>
            @elseif($training->startDatePretest  > now())
            <p style="color:red;"> Test time hasn't started yet </p>
            @elseif ($result != null && $result->pretestscore !== null)
            <div class="alert bg-gray color-palette alert-dismissible">Your test score: {{ $result->pretestscore }}</div>
            @else
            <p>
                Exam Time: <span id="timerPretest">{{$training->pretest->duration}}</span>
                <br>
                Name Test : {{ $training->pretest->nameTest }}.
            </p>
            <div class="icon-bar" >
                <button id="btn1" class="btn btn-sm btn-success" onclick="countdownPretest();">Start Exam<span class="js-timeout"></span>  </button>
            </div>
            @endif

            {{-- @if ($pretest_result != null )
            <div class="alert bg-gray color-palette alert-dismissible">Your test score: {{ $pretest_result->score }}</div>
            @else --}}
            <br>
            <form action="/test/{{$training->id}}/training" method="post">
            @csrf
            <input type="hidden" name="test_id" value="{{ $training->pretest->id }}"> 
            <?php $i = 1; ?>
            <div id="questionHide" style="display:none">
            @foreach($training->pretest->question as $item)
                {{-- @if ($i > 1) <hr /> @endif --}}
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <div class="form-group">
                            <strong>Question {{ $i }}.<br />{!! nl2br($item->question) !!}</strong>

                            <input type="hidden"name="questions[{{ $i }}]"value="{{ $item->id }}">
                            @foreach($item->question_option as $question)
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="answers[{{ $item->id }}]" value="{{ $question->id }}">
                                    {{ $question->option_text }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
            @endforeach
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit results</button>
            </div>
            </form>
            </div>
            {{-- @endif --}}
            {{-- <input type="submit" value=" Submit results " /> --}}
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <a href="/regist" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
            </div>
        </div>
        </div>

        <div class="tab-pane" id="forum">
            @if($forum == "[]")
            Forum
            @else
            @foreach($forum as $item)
            <div class="box-header with-border">
                <!-- Post -->
                <div class="post">
                    <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('style/dist/img/default-user.jpg')}}" alt="user image">
                        <span class="username">
                            <a href="{{url('/forum/'.$item->id)}}">{{ $item->titleForum }}</a>
                
                        </span>
                    <span class="description"><a href="#">{{  $item->user->name  }} </a> | <span class="timestamp">{{ $item->created_at->diffForHumans() }}</span>
                    </div>
                    
                    <ul class="list-inline">
                        <li class="pull-right">
                            {{-- <a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Reply</a> --}}
                        </li>
                    </ul>
                </div>
                @endforeach
                <!-- /.post -->
            </div>
            @endif
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="/regist" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                    </div>
                </div>

        </div>

        <!-- /.tab-pane -->
        <div class="tab-pane" id="modul">

            @if($training->methodTraining == "offline")
            <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Location :</label>
                <div class="col-lg-4">
                    {{-- <select class="form-control select2" id="venue_id" name="venue_id" placeholder="nameVenue" style="width: 100%;" disabled> --}}
                        @if($training->venue!= NULL)
                        {{$training->venue->nameVenue }}
                        @else
                        NULL
                        @endif
                    {{-- </select> --}}
                </div>
                <div class="col-lg-2">
                    <label>Room :</label>
                </div>
                <div class="col-lg-2">
                    {{-- <select class="form-control select2" id="room_id" name="room_id" placeholder="nameRoom" style="width: 100%;" disabled> --}}
                        @if($training->room!= NULL)
                        {{$training->room->nameRoom }}
                        @else
                        NULL
                        @endif
                    {{-- </select> --}}
                </div>
            </div>
            @endif
    
            @if($training->methodTraining == "online")
            <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Link :</label>
                <div class="col-sm-8">
                    @if (strpos($training->url, 'www') !== false)
                    <a href="https://{{$training->url}}/" target="_blank">{{ $training->url }}</a>
                    @elseif (strpos($training->url, 'https') !== false)
                    <a href="{{$training->url}}" target="_blank">{{ $training->url }}</a>
                    @elseif( strpos($training->url, 'www') || strpos($training->url, 'https') == false)
                    <a href="{{$training->url}}">{{ $training->url }}</a>
                    @endif
                    {{-- <input class="form-control select2" type="text" value="{{$training->url}}" disabled> --}}
                </div>
            </div>
            @endif

            <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Description :</label>
                <div class="col-sm-8">
                    {{-- <textarea class="form-control select2" type="text" value="{{$training->description}}" disabled>{{$training->description}}</textarea> --}}
                    {{$training->description}}
                </div>
            </div>

            <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Session :</label>
                <div class="col-sm-8">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>End Date</th>
                                <th>Start Date</th>
                                <th>Trainer</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $number = 0;?>
                                @foreach ($training->training_session as $item)
                                <tr>
                                <?php $number++ ?>
                                <td class="text-center">{{ $number }}</td>
                                <td>{{$item->startDateEvent}}</td>
                                <td>{{$item->endDateEvent}}</td>
                                <td>{{ $item->trainer->user->name }}</td>
                                @endforeach
                            
                                </tr>
                            <tbody>
                            </table>
        
                </div>
            </div>

            
                <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Video :</label>
                <div class="col-sm-8">
                    <div class="text-center"><iframe height="400"  width="600" src="/videos/{{$training->lesson->file}}"></iframe></div>
                </div>
                </div>

                <div class="box-footer">
                    <div class="pull-right">
                        <a href="/regist" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                    </div>
                </div>
    
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="evaluasi">
            @yield('evaluasi')
            <p>
            Evaluasi I Materi</p>
            <a href="/regist/training/{{ $training->id }}/evaluasisatu">{{ $training->surveysatu->nameSurvey }}</a>
            </p>
            <p>
            Evaluasi II Trainer</p>
            {{-- @foreach ($training->training_session as $item)
            <p>{{ $training->id }}</p>
            @endforeach --}}
            @foreach ($training->training_session as $item )
            {{-- {{ $item->id }} --}}
            <p><a href="/regist/training/{{ $training->id }}/{{ $item->id }}/evaluasidua">{{ $item->trainer->user->name }}</a></p>
            @endforeach
            
            {{-- <a href="/regist/training/{{ $training->id }}/evaluasidua">{{ $training->surveydua->nameSurvey }}</a> --}}
            
            </p>
            <div class="box-footer">
                <div class="pull-right">
                    <a href="/regist" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="posttest">
            <div class="panel-body">
                @if($training->endDatePosttest <= now())
                <p style="color:red;"> time is up, next time try to be on time </p>
                @elseif($training->startDatePosttest  >= now())
                <p style="color:red;"> Test time hasn't started yet </p>
                @elseif ($result != null && $result->posttestscore !== null)
                <div class="alert bg-gray color-palette alert-dismissible">Your test score: {{ $result->posttestscore  }}</div>
                @else
                <p>
                    Exam Time:    &nbsp; <span id="timer">{{$training->posttest->duration}}</span>
                    <br>
                    Name Test : {{ $training->posttest->nameTest }}.
                </p>
                <div class="icon-bar" >
                    <button id="btn2" class="btn btn-sm btn-success" onclick="countdownPosttest()">Start Exam<span class="js-timeout"></span></button>
                </div>
                @endif

                {{-- @if ($posttest_result != null )
                <div class="alert bg-gray color-palette alert-dismissible">Your test score: {{ $result->$posttest_result->score }}</div>
                @else --}}
                <br>
                <form action="/test/{{$training->id}}/training" method="post">
                @csrf
                <input type="hidden" name="test_id" value="{{ $training->posttest->id }}"> 
                <?php $i = 1; ?>
                <div id="questionHide2" style="display:none">
                @foreach($training->posttest->question as $item)
                    {{-- @if ($i > 1) <hr /> @endif --}}
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class="form-group">
                                <strong>Question {{ $i }}.<br />{!! nl2br($item->question) !!}</strong>
        
                                <input type="hidden"name="questions[{{ $i }}]"value="{{ $item->id }}">
                                @foreach($item->question_option as $question)
                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="answers[{{ $item->id }}]" value="{{ $question->id }}">
                                        {{ $question->option_text }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                <?php $i++; ?>
                @endforeach
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit results</button>
                </div>
                </form>
                </div>
                {{-- @endif --}}
                {{-- <input type="submit" value=" Submit results " /> --}}
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <a href="/regist" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
    <script type="text/javascript">
        function countdownPretest() {
            var end_date = '<?php echo $training->endDatePretest ?>';
            const tanggalTujuan = new Date(end_date).getTime();
            document.getElementById('questionHide').style.display='block';
            document.getElementById("btn1").disabled = true;
            document.getElementById("btn1").style.backgroundColor = "red";
            
            const countdown = setInterval(function() {
                var start_date = '<?php echo $training->startDatePretest ?>';
                // const sekarang = new Date(start_date).getTime();
                const sekarang = new Date().getTime();
                const selisih = tanggalTujuan - sekarang;
    
                const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
                const jam = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                const menit = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));
                const detik = Math.floor(selisih % (1000 * 60) / 1000);
    
                const timerPretest = document.getElementById('timerPretest');
                timerPretest.innerHTML = hari + ' day ' + jam + ' hours ' + menit + ' minutes ' 
                + detik + ' seconds';
    
                if(selisih <= 0){
                    clearInterval(countdown);
                    timerPretest.innerHTML = 'time out!';
                    document.getElementById("btn1").disabled = true;
                    document.getElementById('questionHide').style.display='none';
                }
            }, 1000);
        }

        function countdownPosttest() {
            var end_date = '<?php echo $training->endDatePosttest ?>';
            const tanggalTujuan = new Date(end_date).getTime();
            document.getElementById('questionHide2').style.display='block';
            document.getElementById("btn2").disabled = true;
            document.getElementById("btn2").style.backgroundColor = "red";

            const countdown = setInterval(function() {
                var start_date = '<?php echo $training->startDatePosttest ?>';
                // const sekarang = new Date(start_date).getTime();
                const sekarang = new Date().getTime();
                const selisih = tanggalTujuan - sekarang;
    
                const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
                const jam = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                const menit = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));
                const detik = Math.floor(selisih % (1000 * 60) / 1000);
    
                const timer = document.getElementById('timer');
                timer.innerHTML = hari + ' day ' + jam + ' hours ' + menit + ' minutes ' 
                + detik + ' seconds';
    
                if(selisih <= 0){
                    clearInterval(countdown);
                    timer.innerHTML = 'time out!';
                    document.getElementById("btn2").disabled = true;
                    document.getElementById('questionHide2').style.display='none';
                }
            }, 1000);
        }
    </script>
@endsection