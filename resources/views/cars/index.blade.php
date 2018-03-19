@extends('layouts.master')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">All CARs</h1>
    </div>
    {{$cars}}
    <div class="wrapper-md">

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default {{--panel-info--}}">
                    <div class="panel-heading">
                        {{--<span class="label bg-danger pull-right m-t-xs" style="margin-left: 5px;">1 left</span>--}}
                        {{--<span class="label bg-info pull-right m-t-xs" style="margin-left: 5px;">2 left</span>--}}
                        {{--<span class="label bg-warning pull-right m-t-xs" style="margin-left: 5px;">3 left</span>--}}
                        {{--<span class="label bg-success pull-right m-t-xs" style="margin-left: 5px;">4 left</span>--}}
                        <form action="/search" method="POST" role="search" style=" display:inline!important;">
                          {{ csrf_field() }}
                        Filter
                        <select class="input-sm form-control w-sm inline v-middle" name ="search">
                            <option value="0">--Select Status--</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endforeach
                            <option value="Unit Head’s Acceptance">Unit Head’s Acceptance</option>
                        </select>
                        <button class="btn btn-sm btn-default">Apply</button>
                      </form>
                    </div>

                    @if (count($cars) > 0)
                    <table class="table table-striped m-b-none">
                        <thead>
                        <tr>
                            <th style="width: 6%">ID</th>
                            <th style="width: 50%;">Description</th>
                            <th class="text-left" style="width: 10%">Unit Head</th>
                            <th class="text-right" style="width: 20%">Status</th>
                            <th class="text-left" style="width: 8%"></th>
                            <th class="text-center" style="width: 12%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>
                                {{ str_limit($car->description, 300, '...') }}
                            </td>
                            <td class="text-left">
                                {{ $car->assignee->first_name }}
                            </td>
                            <td class="text-right">
                              {{--
                                {{ $car->statuses->last()->title }}
                                --}}

                            </td>
                            <td>
                                <div class="progress progress-sm active m-t-xs m-b-none">
                                    <div class="progress-bar {{ $car->statuses->last()->style}}" data-toggle="tooltip" data-original-title="100%" style="width: 100%"></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="/cars/{{ $car->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-4 hidden-xs">
                            </div>
                            <div class="col-sm-4 text-center">
                                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                            </div>
                            <div class="col-sm-4 text-right text-center-xs">
                                <ul class="pagination pagination-sm m-t-none m-b-none">
                                    <li><a href><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href>1</a></li>
                                    <li><a href>2</a></li>
                                    <li><a href>3</a></li>
                                    <li><a href>4</a></li>
                                    <li><a href>5</a></li>
                                    <li><a href><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    @else
                        <h3>No data</h3>
                    @endif
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Statuses
                    </div>
                    <table class="table table-striped m-b-none">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Color</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($statuses as $status)
                        <tr>
                            <td>{{ $status->title }}</td>
                            <td>
                                <div class="progress progress-xs m-t-xs m-b-none">
                                    <div class="progress-bar {{ $status->style }}" data-toggle="tooltip" data-original-title="80%" style="width: 100%"></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
