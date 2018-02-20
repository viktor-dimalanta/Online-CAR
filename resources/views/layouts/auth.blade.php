
<!DOCTYPE html>
<html lang="en">
<head>
    @include ('layouts.partials._head')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
		<div class="content-wrapper">
			@include ('layouts.partials._header-auth')
			
			<div class="content-body">
				<section class="flexbox-container" style="background-color: #CCCCCC;">
					@yield ('content')		
				</section>
			</div>		
		</div>
	</div>

	@include ('layouts.partials._footer-auth')

</body>
</html>