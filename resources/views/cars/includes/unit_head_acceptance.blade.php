@if($current_user_type == "originator")
@php $hidetooriginator = 'none'; @endphp
@else
@php $hidetooriginator =''; @endphp
@endif
<div class="col-sm-12" >
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="form-group">
        <input type="hidden" id="token" value="{{ csrf_token() }}">
      {{csrf_field()}}
      {{method_field('PATCH')}}
        <label>Choose Action</label><br />
        <label><input type="radio" name="action" value="3" id="{{ $car->id }}"> Accept</label>
        <label><input type="radio" name="action"  value="12" id="{{ $car->id }}" > Revise</label>
        <label><input type="radio" name="action"  value="7" id="{{ $car->id }}" > Reject</label>
    </div>
</div>
<br />

<div class="col-sm-12" style="display: {{$hidetooriginator}}">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="form-group">
        <div class="col-sm-12 {{-- text-center--}}" >
            <a href="{{ route('index') }}" class="btn btn-default">Cancel</a>
            <a href="#" onclick="updateStat(this.id);" id="{{ $car->id }}" class="btn btn-success" name="update_car_stat">Update Car Status</a>
        </div>
    </div>
</div>
