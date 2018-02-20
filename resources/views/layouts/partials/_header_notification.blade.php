{{----}}
@if (count($notifications) > 0)
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
            <i class="icon-bell fa-fw"></i>
            <span class="visible-xs-inline">Notifications</span>
            <span class="badge badge-sm up bg-danger pull-right-xs">{{ count($notifications) }}</span>
        </a>
        <!-- dropdown -->
        <div class="dropdown-menu w-xl animated fadeInUp">
            <div class="panel bg-white">

                <div class="panel-heading b-light bg-light">
                    <strong>You have <span>{{ count($notifications) }}</span> notifications</strong>
                </div>
                <div class="list-group">
                    @foreach ($notifications as $notification)
                        <a href class="list-group-item">
                                    <span class="clear block m-b-none">
                                      {{ $notification->title }}<br>
                                      <small class="text-muted">1 hour ago</small>
                                    </span>
                        </a>
                    @endforeach

                </div>
                <div class="panel-footer text-sm">
                    <a href class="pull-right"><i class="fa fa-cog"></i></a>
                    <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>

            </div>
        </div>
        <!-- / dropdown -->
    </li>
@endif
