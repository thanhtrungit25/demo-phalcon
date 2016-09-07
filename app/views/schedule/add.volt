
{{ content() }}

<div class="page-header">
  <h2>Add Your Schedule</h2>
</div>

<div class="alert alert-success fade in hidden">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span id="message"></span>
</div>

{{ form('schedule/add', 'id' : 'scheduleForm') }}

    <div class="control-group">
      {{ form.label('address_start', ['class': 'control-label']) }}
      <div class="controls">
        {{ form.render('address_start', ['class': 'form-control']) }}
        <p class="help-block">(required) <span id="address_start_error" class="error"></span></p>
        {{ form.messages('address_start') }}
      </div>
    </div>

    <div class="control-group">
      {{ form.label('address_end', ['class': 'control-label']) }}
      <div class="controls">
        {{ form.render('address_end', ['class': 'form-control']) }}
        <p class="help-block">(required) <span id="address_end_error" class="error"></span></p>
        {{ form.messages('address_end') }}
      </div>
    </div>
    <p>
      <input type="submit" value="Save" class="btn btn-success">
    </p>

</form>