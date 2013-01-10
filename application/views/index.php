<?php echo $this->session->flashdata('item'); ?>
<p><a href="goals/create">Add Goal</a></p>
<table class="goalstable">
<tr>
    
    <th>ID</th>
    <th>Goal</th>
    <th>Actions</th>
    <th>Created</th>
</tr>
<?php foreach ($goals as $goal) : ?>
<tr>
    <td><?php echo $goal['id'];?></td>
    <td><?php echo $goal['goal']; ?></td>
    <td><?php echo anchor("goals/delete/".$goal['id'], "Delete", "color=#fff"); ?> <?php echo anchor("goals/edit/".$goal['id'], "Edit", "color=#fff"); ?></td>
    <td><?php echo $goal['created']; ?></td>
</tr>
<?php endforeach; ?>
</table>