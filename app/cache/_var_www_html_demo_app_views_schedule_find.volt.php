<?= $this->getContent() ?>

<div class="page-header">
  <h2>Find Schedules With Radius Specific</h2>
</div>

<div class="alert alert-success fade in hidden">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span id="message"></span>
</div>

<?= $this->tag->form(['schedule/find', 'id' => 'scheduleForm', 'method' => 'get']) ?>

    <div class="control-group">
      <?= $form->label('address_start', ['class' => 'control-label']) ?>
      <div class="controls">
        <?= $form->render('address_start', ['class' => 'form-control']) ?>
        <p class="help-block">(required)  <span id="address_start_error" class="error"></span></p>
        <?= $form->messages('address_start') ?>
      </div>
    </div>

    <div class="control-group">
      <?= $form->label('address_end', ['class' => 'control-label']) ?>
      <div class="controls">
        <?= $form->render('address_end', ['class' => 'form-control']) ?>
        <p class="help-block">(required)  <span id="address_end_error" class="error"></span></p>
        <?= $form->messages('address_end') ?>
      </div>
    </div>

  <div class="control-group">
    <?= $form->label('radius', ['class' => 'control-label']) ?>
    <div class="controls">
      <?= $form->render('radius', ['class' => 'form-control']) ?>
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

<div class="map-container">
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Map</h4>
      </div>
      <div class="modal-body">
        <div class="wrap-content">
         <div id="map" style="display:none"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
</div>

