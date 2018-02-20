<!DOCTYPE html>
<html lang="en">
<head>
    @include ('layouts.partials._head')
</head>
<body>
<div class="app app-header-fixed ">

@include ('layouts.partials._header')

<!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">

            @yield ('content')

        </div>
    </div>


    @include ('layouts.partials._footer')

</div>

@include ('layouts.partials._foot')

</body>
</html>
