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

        @if($car->statuses->last()->title == 'Draft')
          @php $disabledcomponent = ''; @endphp
          @php $displaynone = ''; @endphp
        @else
          @php $disabledcomponent = 'disabled'; @endphp
          @php $displaynone ='none'; @endphp
        @endif

        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="panel panel-default">

                <div class="panel-heading font-bold">
                    A. Source Area Details
                </div>
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

                        @if($car->statuses->last()->id == 1 && $current_user_type == "assignee")
                          @include('cars.includes.unit_head_acceptance')
                          @php $displaydraftbutton = 'none'; @endphp
                        @else
                        @php $displaydraftbutton = ''; @endphp
                        @endif

                        @if($current_user_type == "assignee")
                        @php $hidetounithead = 'none'; @endphp
                        @else
                        @php $hidetounithead =''; @endphp
                        @endif

                        @if($car->statuses->last()->id == 3 && $current_user_type == "assignee")
                        @include('cars.includes.originator_acceptance')
                        @else
                        @endif

                        @if($car->statuses->last()->id == 2 && $current_user_type == "assignee")
                        @include('cars.includes.unit_head_response')
                        @else
                        @endif

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

@include('cars.includes.conversation_window')

@endsection
