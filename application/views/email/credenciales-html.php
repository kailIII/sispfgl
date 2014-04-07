<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>Credenciales del sitio <?php echo $site_name; ?></title></head>
    <body>
        <div style="max-width: 800px; margin: 0; padding: 30px 0;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="5%"></td>
                    <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                        <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Su nueva contraseña <?php echo $site_name; ?></h2>
                        A continuación se le presentan las credenciales para entrar al sitio <a href="http://sis-pfgl.gob.sv">SISPFGL</a><br />
                        <br />
                        <?php if (strlen($username) > 0) { ?>Usuario: <?php echo $username; ?><br /><?php } ?>
                        Correo Electrónico: <?php echo $email; ?><br />
                        Contraseña: <?php echo $password; ?><br />
                        <br />
                        <br />
                        Atentamente,<br />
                        <?php echo $site_name; ?>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>