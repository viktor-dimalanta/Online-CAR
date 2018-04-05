<div id="dvSolutions" >
<div class="panel-heading font-bold">C. Solutions</div>
  <div class="col-sm-12 " id="repeatTHIS">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
          <label>Correction</label>
          <div class="col-sm-12" style="padding: 0;">
              <textarea name="immediate_action" id="immediate_action"  class="form-control" rows="8" cols="80" ></textarea>
          </div>
      </div>
      <div class="form-group">
          <label>Target Date</label>
      <div class="input-group date form-group" data-provide="datepicker">
          <input type="text" class="form-control" id="immediate_action_date" name="immediate_action_date">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
    </div>


  </div>


  <div id="reapet_to_this">

  </div>

  <div class="col-sm-12">
    <div class="form-group">
        <div>
            <a href="#" class="btn btn-success" onclick="repeat()" >Add More Correction</a>
        </div>
    </div>
  </div>

  <div class="col-sm-12" id="repeatTHIS2">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
          <label>Root Cause Analysis</label>
          <div class="col-sm-12" style="padding: 0;">

            <div id="root_causes">
            <label class="radio-inline">
              <input type="radio" name="root_cause" value="1">5 Why
            </label>
            <label class="radio-inline">
              <input type="radio" name="root_cause" value="2">BrainStorming
            </label>
            <label class="radio-inline">
              <input type="radio" name="root_cause" value="3">Fishbone Diagram
            </label>
            <label class="radio-inline">
               <input type="radio" name="root_cause" value="4">Others <input type="text" />
            </label>
          </div>

          </div>
      </div>
      <div class="form-group">
        <br /><br />
          <label>Target Date</label>
      <div class="input-group date form-group" data-provide="datepicker">
          <input type="text" name="root_cause_date" class="form-control" id="root_cause_date">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
    </div>

    </div>
    <div id="reapet_to_this2">

    </div>
    <div class="col-sm-12">
    <div class="form-group">
        <div >
            <a href="#" class="btn btn-success" onclick="repeat2()" >Add More Root Cause Analysis</a>
        </div>
    </div>
  </div>

  <div class="col-sm-12" id="repeatTHIS3">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
          <label>Corrective Action</label>
          <div class="col-sm-12" style="padding: 0;">
              <textarea name="corrective_action"  id="corrective_action" class="form-control" rows="8" cols="80"></textarea>
          </div>
      </div>
      <div class="form-group">
          <label>Target Date</label>
      <div class="input-group date form-group" data-provide="datepicker">
          <input type="text" name="corrective_action_date" class="form-control" id="corrective_action_date">
          <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
          </div>
      </div>
    </div>

    </div>
    <div id="reapet_to_this3">

    </div>
    <div class="col-sm-12">
    <div class="form-group">
        <div >
            <a href="#" class="btn btn-success" onclick="repeat3()" >Add More Corrective Action</a>
        </div>
    </div>
  </div>
  </div>

<div class="col-sm-12" >
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="form-group">
        <div class="col-sm-12 {{-- text-center--}}">
            <a href="{{ route('index') }}" class="btn btn-default">Cancel</a>
              <a href="#" onclick="submit_sol(this.id);" id="{{ $car->id }}" class="btn btn-info" name="submit_sol">Submit Car with sol</a>

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
