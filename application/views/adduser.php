<div class="usersform">
<form action="/users/add" id="UserAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>    <fieldset>
        <legend>Add User</legend>
        <div class="input text required"><label for="UserUsername">Username</label><input name="data[User][username]" maxlength="50" type="text" id="UserUsername"/></div><div class="input password required"><label for="UserPassword">Password</label><input name="data[User][password]" type="password" id="UserPassword"/></div><div class="input select required"><label for="UserRole">Role</label><select name="data[User][role]" id="UserRole">
<option value="admin">Admin</option>
<option value="author">Author</option>
</select></div>    </fieldset>
<div class="submit"><input  type="submit" value="Submit"/></div></form></div>
