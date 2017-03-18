<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 15/03/2017
 * Time: 22:06
 */


return '
<form method="post" action="contato">
    <div class="form-group">
        <label for="inputLogin">Login</label>
        <input type="text" class="form-control" id="InputLogin" name="InputLogin" placeholder="Login">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="InputPass" name="InputPass" placeholder="Password">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>';