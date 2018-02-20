<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>Signin - Online CAR</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="/libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

  <link rel="stylesheet" href="/css/font.css" type="text/css" />
  <link rel="stylesheet" href="/css/app.css" type="text/css" />

</head>
<body>
<div class="app app-header-fixed ">


<div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
  <h1 class="text-center">Online CAR</h1>
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Sign in using your KAISA account.</strong>
    </div>

    <form class="form-validation" method="POST" action="/login" novalidate>

      {{ csrf_field() }}

      <div class="text-danger wrapper text-center" ng-show="authError">
          @include ('layouts.partials._errors')
      </div>
      <div class="list-group list-group-sm">
        <div class="list-group-item">
          <input name="email" type="email" placeholder="Email" class="form-control no-border" ng-model="user.email" required>
        </div>
        <div class="list-group-item">
           <input name="password" type="password" placeholder="Password" class="form-control no-border" ng-model="user.password" required>
        </div>
      </div>
      <div class="{{--text-center--}} m-t m-b">
          {{--<input type="checkbox" id="remember" name="remember" class="chk-remember">
          <label for="remember-me"> Remember Me</label>--}}
          <div class="form-group">
              <div class="checkbox">
                <label class="i-checks">
                  <input type="checkbox" checked><i></i> Remember me
                </label>
              </div>

          </div>
      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="login()" ng-disabled='form.$invalid'>Log in</button>
      <div class="text-center m-t m-b"><a ui-sref="access.forgotpwd">Forgot password?</a></div>
      <div class="line line-dashed"></div>
      <p class="text-center"><small><a href="#">Do not have an account?</a></small></p>

    </form>
  </div>
  <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
    <p>
  <small class="text-muted">KAISA Consulting &copy; 2018</small>
</p>
  </div>
</div>


</div>

<script src="/libs/jquery/jquery/dist/jquery.js"></script>
<script src="/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="/js/ui-load.js"></script>
<script src="/js/ui-jp.config.js"></script>
<script src="/js/ui-jp.js"></script>
<script src="/js/ui-nav.js"></script>
<script src="/js/ui-toggle.js"></script>
<script src="/js/ui-client.js"></script>

</body>
</html>
