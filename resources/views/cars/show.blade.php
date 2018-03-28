@extends('layouts.master')

@section('content')

    <form role="form" method="POST" action="{{ route('cars') }}">


        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-normal h3"><label style="color: #999;">Status:</label> {{ $car->statuses->last()->title }} </h1>
        </div>

        <div>&nbsp;</div>

        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h4">Originator's Window</h1>
        </div>

        @include('layouts.partials._errors')

        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="panel panel-default">

                <div class="panel-heading font-bold">
                    A. Source Area Details
                </div>
                  @if($car->statuses->last()->title == 'Draft')
                    @php $disabledcomponent = ''; @endphp
                    @php $displaynone = ''; @endphp
                  @else
                    @php $disabledcomponent = 'disabled'; @endphp
                    @php $displaynone ='none'; @endphp
                  @endif
                <div class="row">
                    <div class="panel-body">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Source Area</label>


                                <select name="source_id" ui-jq="chosen" class="w-full "{{$disabledcomponent}}>
                                    <option value="">---Choose---</option>
                                    @foreach ($sources as $source)
                                        <option value="{{ $source->id  }}">{{ $source->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Unit Head</label>

                                <select name="assignee_id" ui-jq="chosen" class="w-full" {{$disabledcomponent}}>
                                    <option value="">{{ $car->assignee->first_name }} {{ $car->assignee->last_name }}</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="panel-heading font-bold">
                    B. CAR Details
                </div>

                <div class="row">
                    <div class="panel-body">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Classification</label>
                                <select name="classification_id" ui-jq="chosen" class="w-full" {{$disabledcomponent}}>
                                    <option value="">{{ $car->classification->title  }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document / Reference no.</label>
                                <input value="{{ $car->document_no }}" {{$disabledcomponent}} name="document_no" type="text" class="form-control" placeholder="Enter document number">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="col-sm-12" style="padding: 0;">
                                    <textarea name="description" {{$disabledcomponent}} class="form-control" rows="8" cols="80">{{ $car->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- show action if unit head accept --}}

                        @if($car->statuses->last()->id == 1)
                        @php $displaynone = ''; @endphp
                        @php $displaydraftbutton = 'none'; @endphp
                        @else
                        @php $displaynone ='none'; @endphp
                        @php $displaydraftbutton = ''; @endphp
                        @endif

                        @if($current_user_type == "originator")
                        @php $hidetooriginator = 'none'; @endphp
                        @else
                        @php $hidetooriginator =''; @endphp
                        @endif

                        @if($current_user_type == "assignee")
                        @php $hidetounithead = 'none'; @endphp
                        @else
                        @php $hidetounithead =''; @endphp
                        @endif


                        <div class="col-sm-12" style="display: {{ $displaynone }}">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <input type="hidden" id="token" value="{{ csrf_token() }}">
                              {{csrf_field()}}
                              {{method_field('PATCH')}}
                                <label>Choose Action</label><br />
                                <label><input type="radio" name="action" value="3" id="{{ $car->id }}"> Accept</label>
                                <label><input type="radio" name="action"  value="12" id="{{ $car->id }}" > Revise</label>
                                <label><input type="radio" name="action"  value="7" id="{{ $car->id }}" > Reject</label>
                            </div>
                        </div>
                        <br />

                        <div class="col-sm-12" style="display: {{$hidetooriginator}}">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-12 {{-- text-center--}}" style="display: {{ $displaynone }}">
                                    <a href="{{ route('index') }}" class="btn btn-default">Cancel</a>
                                    <a href="#" onclick="updateStat2(this.id);" id="{{ $car->id }}" class="btn btn-success" name="update_car_stat">Update Car Status</a>
                                </div>
                            </div>
                        </div>



                        <div id="dvSolutions" style="display:none">
                        <div class="panel-heading font-bold">
                            C. Solutions
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <label>Immediate Action</label>
                                <div class="col-sm-12" style="padding: 0;">
                                    <textarea name="immediate_action"  class="form-control" rows="8" cols="80"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Target Date</label>
                            <div class="input-group date form-group" data-provide="datepicker">
                                <input type="text" class="form-control">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label>Acceptance By Originator</label>
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
                              <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Accept</label>
                              <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
                              <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Revise</label>
                          </div>
                        </div>



                          <div class="form-group">
                              <div  style="display: {{ $hidetooriginator }}">
                                  <a href="{{ route('index') }}" class="btn btn-success">Add More Immediate Action</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <label>Root Cause Analysis</label>
                                <div class="col-sm-12" style="padding: 0;">
                                    <textarea name="immediate_action"  class="form-control" rows="8" cols="80"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Target Date</label>
                            <div class="input-group date form-group" data-provide="datepicker">
                                <input type="text" class="form-control">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                          </div>
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
                              <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Accept</label>
                              <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
                              <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Revise</label>
                          </div>
                          <div class="form-group">
                              <div  style="display: {{ $hidetooriginator }}">
                                  <a href="{{ route('index') }}" class="btn btn-success">Add More Root Cause Analysis</a>
                              </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <label>Corrective Action</label>
                                <div class="col-sm-12" style="padding: 0;">
                                    <textarea name="immediate_action"  class="form-control" rows="8" cols="80"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Target Date</label>
                            <div class="input-group date form-group" data-provide="datepicker">
                                <input type="text" class="form-control">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                          </div>
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
                              <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Accept</label>
                              <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
                              <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Revise</label>
                          </div>
                          <div class="form-group">
                              <div  style="display: {{ $hidetooriginator }}">
                                  <a href="{{ route('index') }}" class="btn btn-success">Add More Corrective Action</a>
                              </div>
                          </div>
                        </div>



                        </div>





                        <div class="col-sm-12" style="display: {{$hidetounithead}}">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-12 {{-- text-center--}}" style="display: {{ $displaynone }}">
                                    <a href="{{ route('index') }}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-warning" name="draft_button" style="display: {{ $displaydraftbutton }}" >Save Draft</button>
                                    <button type="button" class="btn btn-success" name="save">Submit CAR</button>
                                </div>
                            </div>
                        </div>















                        {{--

                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <label>Attachment(s)</label>
                                <div class="col-sm-12 col-attachments">
                                    <input name="attachments[]" ui-jq="filestyle"
                                           ui-options="{icon: false, buttonName: 'btn-primary'}" type="file"><br/>
                                    <input name="attachments[]" ui-jq="filestyle"
                                           ui-options="{icon: false, buttonName: 'btn-primary'}" type="file"><br/>
                                </div>

                            </div>
                        </div>


                        <div class="col-sm-12" >
                            <div class="col-sm-12 text-right wrapper">
                                <button class="btn btn-dark btn-xs btn-rounded">Add attachment</button>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-12  text-center">
                                    <button type="submit" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit CAR</button>
                                </div>
                            </div>
                        </div>
                        --}}

                    </div>
                </div>

            </div>
        </div>

    </form>



    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Conversations Window</h1>
    </div>

    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="panel panel-default">


            <div class="row">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Enter your message</label>
                            <div class="col-sm-12" style="padding: 0;">
                                <textarea name="name" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label>Action</label>
                            <select ui-jq="chosen" class="w-full">
                                <option value="">---Choose---</option>
                                <option value="SA1">Accept</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <div class="col-sm-12 {{-- text-center--}}">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="hbox hbox-auto-xs hbox-auto-sm">
        <div class="col">

            <div class="wrapper bg-white b-b">
                <ul class="nav nav-pills nav-sm">
                    <li class="active"><a href>Conversations History</a></li>
                    {{-- <li><a href>Profile</a></li>
                    <li><a href>Messages</a></li> --}}
                </ul>
            </div>
            <div class="padder">
                <div class="streamline b-l b-info m-l-lg m-b padder-v">
                    @foreach ($car->messages as $message)
                        <div>
                            <a class="pull-left thumb-sm avatar m-l-n-md">
                                <img src="/img/a9.jpg" class="img-circle" alt="...">
                            </a>
                            <div class="m-l-lg">
                                <div class="m-b-xs">
                                    <a href class="h4">John smith </a>
                                    <span class="text-muted m-l-sm pull-right">
                                  Just now
                                </span>
                                </div>
                                <div class="m-b">
                                    <div>
                                        {{ $message->message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{--
                    <div>
                        <a class="pull-left thumb-sm avatar m-l-n-md">
                            <img src="/img/a9.jpg" class="img-circle" alt="...">
                        </a>
                        <div class="m-l-lg">
                            <div class="m-b-xs">
                                <a href class="h4">John smith</a>
                                <span class="text-muted m-l-sm pull-right">
                                  Just now
                                </span>
                            </div>
                            <div class="m-b">
                                <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet. ullamcorper sodales nisi nec adipiscing elit.
                                    Morbi id neque quam. Aliquam sollicitudin
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <a class="pull-left thumb-sm avatar m-l-n-md">
                            <img src="/img/a3.jpg" class="img-circle" alt="...">
                        </a>
                        <div class="m-l-lg">
                            <div class="m-b-xs">
                                <a href class="h4">By me</a>
                                <span class="text-muted m-l-sm pull-right">
                        Just now
                      </span>
                            </div>
                            <div class="m-b">
                                <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet. ullamcorper sodales nisi nec adipiscing elit.
                                    Morbi id neque quam. Aliquam sollicitudin
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- .comment-reply -->
                    <div class="m-l-lg">
                        <a class="pull-left thumb-sm avatar">
                            <img src="/img/a5.jpg" alt="...">
                        </a>
                        <div class="m-l-xxl panel b-a">
                            <div class="panel-heading pos-rlt">
                                <span class="arrow left pull-up"></span>
                                <span class="text-muted m-l-sm pull-right">
                        10m ago
                      </span>
                                <a href>Mika Sam</a>
                                Report this comment is helpful
                            </div>
                        </div>
                    </div>
                    <!-- / .comment-reply -->


                    <div>
                        <a class="pull-left thumb-sm avatar m-l-n-md">
                            <img src="/img/a4.jpg" class="img-circle" alt="...">
                        </a>
                        <div class="m-l-lg">
                            <div class="m-b-xs">
                                <a href class="h4">Fisio</a>
                                <span class="text-muted m-l-sm pull-right">
                        Just now
                      </span>
                            </div>
                            <div class="m-b">
                                <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet. ullamcorper sodales nisi nec adipiscing elit.
                                    Morbi id neque quam. Aliquam sollicitudin
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- .comment-reply -->
                    <div class="m-l-lg">
                        <a class="pull-left thumb-sm avatar">
                            <img src="/img/a5.jpg" alt="...">
                        </a>
                        <div class="m-l-xxl panel b-a">
                            <div class="panel-heading pos-rlt">
                                <span class="arrow left pull-up"></span>
                                <span class="text-muted m-l-sm pull-right">
                        10m ago
                      </span>
                                <a href>Mika Sam</a>
                                Report this comment is helpful 3
                            </div>


                        </div>

                        <div class="m-l-xxl panel b-a"
                             style="background: none; border: none; -webkit-box-shadow: none; box-shadow: none;">
                            <div>
                                <a class="pull-left thumb-sm avatar m-l-n-md">
                                    <img src="/img/a4.jpg" class="img-circle" alt="...">
                                </a>
                                <div class="m-l-lg">
                                    <div class="m-b">


                                        <div class="panel panel-default m-t-md m-b-n-sm pos-rlt">
                                            <form>
                                                    <textarea class="form-control no-border" rows="3"
                                                              placeholder="Your comment..."></textarea>
                                            </form>
                                            <div class="panel-footer bg-light lter">
                                                <button class="btn btn-info pull-right btn-sm">Comment</button>
                                                <ul class="nav nav-pills nav-sm">
                                                    <li><a href><i class="fa fa-camera text-muted"></i></a></li>
                                                    <li><a href><i class="fa fa-video-camera text-muted"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / .comment-reply -->
                    --}}

                </div>
            </div>
        </div>
    </div>


@endsection
