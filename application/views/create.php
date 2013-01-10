<fieldset id="addgoal">
<legend>Create a goal</legend>
<?php echo validation_errors(); ?>
<?php echo form_open('goals/create') ?>
<label for="goal">Goal</label>
<input type="input" name="goal" /><br />
<label for="description">Description</label>
<textarea name="description"></textarea><br />
<input type="submit" name="submit" value="Create goal" />
</form>
</fieldset>


