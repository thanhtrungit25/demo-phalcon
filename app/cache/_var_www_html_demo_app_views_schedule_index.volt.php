<?= $this->getContent() ?>

<h2>Your Schedule</h2>
<?= $this->tag->linkTo(['schedule/add', 'Add new schedule', 'class' => 'btn btn-primary']) ?>

<?php $v27359488131247513081iterated = false; ?><?php $v27359488131247513081iterator = $schedules; $v27359488131247513081incr = 0; $v27359488131247513081loop = new stdClass(); $v27359488131247513081loop->self = &$v27359488131247513081loop; $v27359488131247513081loop->length = count($v27359488131247513081iterator); $v27359488131247513081loop->index = 1; $v27359488131247513081loop->index0 = 1; $v27359488131247513081loop->revindex = $v27359488131247513081loop->length; $v27359488131247513081loop->revindex0 = $v27359488131247513081loop->length - 1; ?><?php foreach ($v27359488131247513081iterator as $schedule) { ?><?php $v27359488131247513081loop->first = ($v27359488131247513081incr == 0); $v27359488131247513081loop->index = $v27359488131247513081incr + 1; $v27359488131247513081loop->index0 = $v27359488131247513081incr; $v27359488131247513081loop->revindex = $v27359488131247513081loop->length - $v27359488131247513081incr; $v27359488131247513081loop->revindex0 = $v27359488131247513081loop->length - ($v27359488131247513081incr + 1); $v27359488131247513081loop->last = ($v27359488131247513081incr == ($v27359488131247513081loop->length - 1)); ?><?php $v27359488131247513081iterated = true; ?>
<?php if ($v27359488131247513081loop->first) { ?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>Schedule ID</td>
            <td>Address start</td>
            <td>Address end</td>
            <td>Action</td>
        </tr>
    </thead>
<?php } ?>

    <tbody>
        <tr>
            <td><?= $schedule->id ?></td>
            <td>
            <?php foreach ($schedule->address_start as $address_start) { ?>

            <?= $address_start ?>

            <?php } ?>
            </td>
            <td><?= $schedule->address_end ?></td>
            <td><span class="label label-success">Success</span></td>
        </tr>
    </tbody>

<?php if ($v27359488131247513081loop->last) { ?>
</table>
<?php } ?>

<?php $v27359488131247513081incr++; } if (!$v27359488131247513081iterated) { ?>
    No schedule are recorded
<?php } ?>