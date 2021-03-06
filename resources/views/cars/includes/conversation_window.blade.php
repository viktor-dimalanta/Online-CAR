


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
