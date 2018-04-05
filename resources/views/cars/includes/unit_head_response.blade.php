<div id="dvSolutions" >
<div class="panel-heading font-bold">C. Solutions</div>
  <div class="col-sm-12 " id="repeatTHIS">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
          <label>Correction</label>
          <div class="col-sm-12" style="padding: 0;">
              <textarea name="immediate_action"  id="immediate_action"  class="form-control" rows="8" cols="80" disabled>{{ $car->solutions[0]->description }}</textarea>
          </div>
      </div>
      <div class="form-group">
          <label>Target Date</label>
      <div class="input-group date form-group" d>
          <input type="text" class="form-control" value="{{ $car->solutions[0]->target_date }}"  name="immediate_action_date" disabled>
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
    </div>


  </div>

  @if ($car->solutions[1]->root_cause_type == 1)
  @php $checked1 = 'checked'; @endphp
  @else
  @php $checked1 = ''; @endphp
  @endif

  @if ($car->solutions[1]->root_cause_type == 2)
  @php $checked2 = 'checked'; @endphp
  @else
  @php $checked2 = ''; @endphp
  @endif

  @if ($car->solutions[1]->root_cause_type == 3)
  @php $checked3 = 'checked'; @endphp
  @else
  @php $checked3 = ''; @endphp
  @endif

  @if ($car->solutions[1]->root_cause_type == 4)
  @php $checked4 = 'checked'; @endphp
  @else
  @php $checked4 = ''; @endphp
  @endif
  <div class="col-sm-12" id="repeatTHIS2">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
          <label>Root Cause Analysis</label>
          <div class="col-sm-12" style="padding: 0;">

            <div id="root_causes" disabled>
            <label class="radio-inline">
              <input type="radio" name="root_cause" value="1" disabled {{ $checked1 }}>5 Why
            </label>
            <label class="radio-inline">
              <input type="radio" name="root_cause" value="2" disabled  {{ $checked2 }}>BrainStorming
            </label>
            <label class="radio-inline">
              <input type="radio" name="root_cause" value="3" disabled  {{ $checked3 }}>Fishbone Diagram
            </label>
            <label class="radio-inline">
               <input type="radio" name="root_cause" value="4" disabled  {{ $checked4}}>Others <input type="text" disabled />
            </label>
          </div>

          </div>
      </div>
      <div class="form-group">
        <br /><br />
          <label>Target Date</label>
      <div class="input-group date form-group" >
          <input type="text" name="root_cause_date" value="{{ $car->solutions[1]->target_date }}"  class="form-control" id="root_cause_date" disabled>
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
    </div>

    </div>


  <div class="col-sm-12" id="repeatTHIS3">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
          <label>Corrective Action</label>
          <div class="col-sm-12" style="padding: 0;">
              <textarea name="corrective_action"  id="corrective_action" class="form-control" rows="8" cols="80" disabled>{{ $car->solutions[2]->description }}</textarea>
          </div>
      </div>
      <div class="form-group">
          <label>Target Date</label>
      <div class="input-group date form-group">
          <input type="text" name="corrective_action_date" value="{{ $car->solutions[2]->target_date }}"  class="form-control" id="corrective_action_date" disabled>
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
    </div>

    </div>

  </div>







{{--

  <div class="form-check" style="display: {{$hidetounithead}}">
      <label>Acceptance By Originator</label>
      <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
      <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Accept</label>
      <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
      <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Revise</label>
  </div>

  <div class="form-check" style="display: {{$hidetounithead}}">
      <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
      <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Accept</label>
      <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
      <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Revise</label>
  </div>

  <div class="form-check" style="display: {{$hidetounithead}}">
      <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
      <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Accept</label>
      <input type="checkbox" class="form-check-input" id="checkbox104" style="width:30px; height:30px;">
      <label class="form-check-label" for="checkbox104" style="margin-top: -33px;font-size: 18px; margin-left:40px; display:block;">Revise</label>
  </div>

  --}}
