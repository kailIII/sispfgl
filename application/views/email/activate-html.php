<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>Bienvenido a <?php echo $site_name; ?>!</title></head>
    <body>
        <div style="max-width: 800px; margin: 0; padding: 30px 0;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="5%"></td>
                    <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                        <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Welcome to <?php echo $site_name; ?>!</h2>
                        Has sido agregado como usuario al <?php echo $site_name; ?>.<br />
                        <br />
                        La información de tu cuenta es la siguiente:
                        <br />
                        <?php if (strlen($username) > 0) { ?>Usuario ==> <?php echo $username; ?><br /><?php } ?>
                        Correo Electrónico ==> <?php echo $email; ?><br />
                        <?php if (isset($password)) { ?>Contraseña==> <?php echo $password; ?><br /><?php } ?>
                        <br />
                        <br />

                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>