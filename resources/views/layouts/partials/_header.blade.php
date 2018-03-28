<!-- header -->
<header id="header" class="app-header navbar" role="menu">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- navbar header -->
    <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
            <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
            <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="/dashboard" class="navbar-brand text-lt">
            <i class="fa fa-btc"></i>
            <img src="/img/logo.png" alt="." class="hide">
            <span class="hidden-folded m-l-xs">Online CAR</span>
        </a>
        <!-- / brand -->
    </div>
    <!-- / navbar header -->

    <!-- navbar collapse -->
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
            <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>
            <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
                <i class="icon-user fa-fw"></i>
            </a>
        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
        <ul class="nav navbar-nav hidden-sm">

            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
                    <span translate="header.navbar.new.NEW">New</span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/cars/create" translate="header.navbar.new.PROJECT">Add New CAR</a></li>
                    {{--<li>
                        <a href>
                            <span class="badge bg-info pull-right">5</span>
                            <span translate="header.navbar.new.TASK">Task</span>
                        </a>
                    </li>
                    <li><a href translate="header.navbar.new.USER">User</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href>
                            <span class="badge bg-danger pull-right">4</span>
                            <span translate="header.navbar.new.EMAIL">Email</span>
                        </a>
                    </li>--}}
                </ul>
            </li>
        </ul>
        <!-- / link and dropdown -->

        <!-- search form -->
        <form class="navbar-form navbar-form-sm navbar-left shift" action="/search_cars" method="POST" role="search">
          {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group">
                    <input type="text" ng-model="selected" name="search_cars"
                           typeahead="state for state in states | filter:$viewValue | limitTo:8"
                           class="form-control input-sm bg-light no-border rounded padder" placeholder="Search CARs...">
                    <span class="input-group-btn">
            <button href="{{ route('search_cars') }}" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
          </span>
                </div>
            </div>
        </form>
        <!-- / search form -->

        <!-- nabar right -->

        <ul class="nav navbar-nav navbar-right">
            @include ('layouts.partials._header_notification')

            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                        <img src="/img/a0.jpg" alt="...">
                        <i class="on md b-white bottom"></i>
                      </span>
                    <span class="hidden-sm hidden-md">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    <b class="caret"></b>
                </a>
                <!-- dropdown -->
                <ul class="dropdown-menu animated fadeInRight w">
                    <li>
                        <a ui-sref="app.docs">

                            Help
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                </ul>
                <!-- / dropdown -->
            </li>
        </ul>
        <!-- / navbar right -->
    </div>
    <!-- / navbar collapse -->
</header>
<!-- / header -->


<!-- aside -->
<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user -->
            <div class="clearfix hidden-xs text-center hide" id="aside-user">
                <div class="dropdown wrapper">
                    <a href="app.page.profile">
            <span class="thumb-lg w-auto-folded avatar m-t-sm">
              <img src="/img/a0.jpg" class="img-full" alt="...">
            </span>
                    </a>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
            <span class="clear">
              <span class="block m-t-sm">
                <strong class="font-bold text-lt">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong>
                <b class="caret"></b>
              </span>
              <span class="text-muted text-xs block">User Type</span>
            </span>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                        <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                            <span class="arrow top hidden-folded arrow-info"></span>
                            <div>
                                <p>300mb of 500mb used</p>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%"
                                     style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>Settings</a>
                        </li>
                        <li>
                            <a href="page_profile.html">Profile</a>
                        </li>
                        <li>
                            <a href>
                                <span class="badge bg-danger pull-right">3</span>
                                Notifications
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/logout">Logout</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </div>
                <div class="line dk hidden-folded"></div>
            </div>
            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Navigation</span>
                    </li>
                    <li>
                        <a href="/dashboard" class="auto">
                            <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                            <span class="font-bold">Dashboard</span>
                        </a>

                    </li>

                    <li class="line dk"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Modules</span>
                    </li>
                    <li>
                        <a href class="auto">
              <span class="pull-right text-muted">
                <i class="fa fa-fw fa-angle-right text"></i>
                <i class="fa fa-fw fa-angle-down text-active"></i>
              </span>
                            {{--<b class="badge bg-info pull-right">3</b>--}}
                            <i class="glyphicon glyphicon-list  icon text-info-lter"></i>
                            <span>CARs</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            {{-- <li class="nav-sub-header">
                                <a href>
                                    <span>New CAR</span>
                                </a>
                            </li>--}}
                            <li>
                                <a href="/cars">
                                    <span>All CARs</span>
                                </a>
                            </li>
                            <li>
                                <a href="/cars/create">
                                    <span>Add New CAR</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="line dk hidden-folded"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Support</span>
                    </li>
                    <li>
                        <a href>
                            <i class="icon-question icon"></i>
                            <span>Help</span>
                        </a>
                    </li>
                    <li>
                        <a href>
                            <i class="glyphicon glyphicon-file icon"></i>
                            <span>Version</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- nav -->

            <!-- aside footer -->
            <div class="wrapper m-t">
                <div class="text-center-folded">
                    <span class="pull-right pull-none-folded">12</span>
                    <span class="hidden-folded">New CARs</span>
                </div>
                <div class="progress progress-xxs m-t-sm dk">
                    <div class="progress-bar progress-bar-info" style="width: 60%;">
                    </div>
                </div>
                {{----}}
                <div class="text-center-folded">
                    <span class="pull-right pull-none-folded">20</span>
                    <span class="hidden-folded">Processing CARs</span>
                </div>
                <div class="progress progress-xxs m-t-sm dk">
                    <div class="progress-bar progress-bar-primary" style="width: 75%;">
                    </div>
                </div>
            </div>
            <!-- / aside footer -->
        </div>
    </div>
</aside>
<!-- / aside -->
