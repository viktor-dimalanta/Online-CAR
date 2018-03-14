@extends('layouts.master')

@section('content')
    <form role="form" method="POST" action="{{ route('cars') }}">
        {{ csrf_field() }}

        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h4">Originator's Window2</h1>
        </div>

        @include('layouts.partials._errors')

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
                                <select name="source_id" ui-jq="chosen" class="w-full">
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
                                <select name="assignee_id" ui-jq="chosen" class="w-full">
                                    <option value="">---Choose---</option>
                                    @foreach($assignees as $assignee)
                                        <option value="{{ $assignee->id }}">{{ $assignee->first_name }} {{ $assignee->last_name }}</option>
                                    @endforeach
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
                                <select name="classification_id" ui-jq="chosen" class="w-full">
                                    <option value="">---Choose---</option>
                                    @foreach($classifications as $classification)
                                        <option value="{{ $classification->id  }}">{{ $classification->title  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document / Reference no.</label>
                                <input name="document_no" type="text" class="form-control" placeholder="Enter document number">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="col-sm-12" style="padding: 0;">
                                    <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
                                </div>
                            </div>
                        </div>

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
                        <div class="col-sm-12">
                            <div class="col-sm-12 text-right {{--wrapper--}}">
                                <button class="btn btn-dark btn-xs btn-rounded">Add attachment</button>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-12 {{-- text-center--}}">
                                    <button type="submit" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-warning" name="draft_button" value="11">Draft</button>
                                    <button type="submit" class="btn btn-success" name="save">Submit CAR</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </form>






@endsection
