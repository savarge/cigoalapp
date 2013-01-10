<fieldset id="editgoal">
<legend>Edit goal</legend>
<?php echo validation_errors(); ?>
<?php echo form_open('goals/edit/'.$goal->id) ?>
<label for="goal">Goal</label>
<input type="input" name="goal" value=<?php echo "$goal->goal" ?> /><br />
<label for="description">Description</label>
<textarea name="description"><?php echo "$goal->description" ?></textarea><br />
<input type="submit" name="submit" value="Update goal" />
</form>
</fieldset>