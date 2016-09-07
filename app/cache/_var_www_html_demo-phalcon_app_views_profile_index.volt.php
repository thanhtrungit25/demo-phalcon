
<?= $this->getContent() ?>

<div>
  <?= $this->tag->form([]) ?>
  <div>
    <label for="name">Your full name</label>
    <div class="input">
      <?= $this->tag->textField(['name', 'size' => '30', 'class' => 'span6']) ?>
    </div>
  </div>

  <div>
    <label for="email">Your email</label>
    <div class="input">
      <?= $this->tag->textField(['email', 'size' => '30', 'class' => 'span6']) ?>
    </div>
  </div>

  <div>
    <input type="submit" value="Update" class="btn btn-primary btn-large btn-info">
    <?= $this->tag->linkTo(['index/index', 'Cancel']) ?>
  </div>
  </form>
</div>