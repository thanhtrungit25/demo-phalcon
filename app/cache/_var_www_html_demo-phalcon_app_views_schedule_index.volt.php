<?= $this->getContent() ?>

<h2>Your Schedule</h2>
<?= $this->tag->linkTo(['schedule/add', 'Add new schedule', 'class' => 'btn btn-primary']) ?>

<?php $v132060387373359138861iterated = false; ?><?php $v132060387373359138861iterator = $schedules; $v132060387373359138861incr = 0; $v132060387373359138861loop = new stdClass(); $v132060387373359138861loop->self = &$v132060387373359138861loop; $v132060387373359138861loop->length = count($v132060387373359138861iterator); $v132060387373359138861loop->index = 1; $v132060387373359138861loop->index0 = 1; $v132060387373359138861loop->revindex = $v132060387373359138861loop->length; $v132060387373359138861loop->revindex0 = $v132060387373359138861loop->length - 1; ?><?php foreach ($v132060387373359138861iterator as $schedule) { ?><?php $v132060387373359138861loop->first = ($v132060387373359138861incr == 0); $v132060387373359138861loop->index = $v132060387373359138861incr + 1; $v132060387373359138861loop->index0 = $v132060387373359138861incr; $v132060387373359138861loop->revindex = $v132060387373359138861loop->length - $v132060387373359138861incr; $v132060387373359138861loop->revindex0 = $v132060387373359138861loop->length - ($v132060387373359138861incr + 1); $v132060387373359138861loop->last = ($v132060387373359138861incr == ($v132060387373359138861loop->length - 1)); ?><?php $v132060387373359138861iterated = true; ?>
<?php if ($v132060387373359138861loop->first) { ?>
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

<?php if ($v132060387373359138861loop->last) { ?>
</table>
<?php } ?>

<?php $v132060387373359138861incr++; } if (!$v132060387373359138861iterated) { ?>
    No schedule are recorded
<?php } ?>