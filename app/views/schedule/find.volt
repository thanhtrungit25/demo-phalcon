{{ content() }}

<div class="page-header">
  <h2>Find Schedules With Radius Specific</h2>
</div>

<div class="alert alert-success fade in hidden">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span id="message"></span>
</div>

{{ form('schedule/find', 'id' : 'scheduleForm', 'method': 'get') }}

    <div class="control-group">
      {{ form.label('address_start', ['class': 'control-label']) }}
      <div class="controls">
        {{ form.render('address_start', ['class': 'form-control']) }}
        <p class="help-block">(required)  <span id="address_start_error" class="error"></span></p>
        {{ form.messages('address_start') }}
      </div>
    </div>

    <div class="control-group">
      {{ form.label('address_end', ['class': 'control-label']) }}
      <div class="controls">
        {{ form.render('address_end', ['class': 'form-control']) }}
        <p class="help-block">(required)  <span id="address_end_error" class="error"></span></p>
        {{ form.messages('address_end') }}
      </div>
    </div>

  <div class="control-group">
    {{ form.label('radius', ['class': 'control-label']) }}
    <div class="controls">
      {{ form.render('radius', ['class': 'form-control']) }}
    </div>
  </div>

    <p>
      <input type="submit" value="Find" class="btn btn-primary">
    </p>

</form>

<p id="info" style="display:none;"></p>
<table class="table" style="display:none;">
  <thead>
    <tr>
      <th>#</th>
      <th>Address Start</th>
      <th>Address End</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="records_body">
  </tbody>
</table>