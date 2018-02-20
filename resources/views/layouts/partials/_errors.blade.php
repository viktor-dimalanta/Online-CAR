@if ($errors->any())
<div class="row">
    <div class="alert alert-danger no-border mb-2" role="alert">
        <strong>Oh snap!</strong> Please fix the following error(s):<br />
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif