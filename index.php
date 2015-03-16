<?php
echo"<html>
    <head>
    <title>Login Form</title>
    <link rel='stylesheet' href='css.css'>
        FileAuth <bold> username:</bold> Chuck  <bold>password: </bold>Norris<br>
        MemAuth  <bold> username:</bold> memauth <bold>password:</bold> 123456<br>
        MySQLAuth  <bold> username:</bold> mysql <bold>password:</bold> pdo<br>
        SQLiteAuth  <bold> username:</bold> SQLite <bold>password:</bold> Litepass<br>
    </head>
    
    <center>
        <form id='loginInfo' name='loginInfo' method='post' action='Login.php'>
                <table width='510' border='0' align='center'>
                    <tr>
                        <td align='right'>Username: </td>
                            <td><input type='text' name='username' id='username' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>Password: </td>
                        <td><input type='password' name='password' id='password' />
						</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        
						<td>
                            <input type='submit' name='loginButton' id='loginButton' value='Login' />
							<input type='radio' name='authType' value='File' checked>File
							<input type='radio' name='authType' value='Mem'>Mem
                                                        <input type='radio' name='authType' value='MySQL'>MySQL
                                                        <input type='radio' name='authType' value='SQLite'>SQLite
						</td>
                    </tr>
                </table>
        </form>
    </center>
</html>";