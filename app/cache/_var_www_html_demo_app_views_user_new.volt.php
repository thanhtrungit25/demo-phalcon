<?= $this->getContent() ?>

<div class="page-header">
  <h2>Register user form</h2>
</div>

<?= $this->tag->form(['user/create', 'id' => 'registerForm', 'onbeforesubmit' => 'return false']) ?>

<table>
    <tr>
        <td align="right">
            <label for="username">Username</label>
        </td>
        <td align="left">
            <?= $this->tag->textField(['username', 'size' => 30]) ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="password">Password</label>
        </td>
        <td align="left">
            <?= $this->tag->passwordField(['password', 'size' => 30]) ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="full_name">Full Of Name</label>
        </td>
        <td align="left">
            <?= $this->tag->textField(['full_name', 'size' => 30]) ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?= $this->tag->submitButton(['Save']) ?></td>
    </tr>
</table>

</form>