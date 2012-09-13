<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>Bienvenido al Sistema  <?php echo $site_name; ?>!</title></head>
    <body>
        <div style="max-width: 800px; margin: 0; padding: 30px 0;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="5%"></td>
                    <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                        <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Bienvenido al <?php echo $site_name; ?>!</h2>
                        Se ha creado un usuario asociado a esta cuenta de correo electrónico para el Sistema 
                        de Informacion y Seguimiento para el Programa de Fortalecimiento de Gobiernos Locales <?php echo $site_name; ?>.
                        De clic en el siguiente link para activar su usuario:<br />
                        <br />
                        <big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?>" style="color: #3366cc;">Verificar su registro...</a></b></big><br />
                        <br />
                        Si el link no funciona; por favor copie el siguiente link en la barra de direcciones
                        de su navegador:<br />
                <nobr><a href="<?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/activate/' . $user_id . '/' . $new_email_key); ?></a></nobr><br />
                <br />
                Por favor, verificarlo antes de <?php echo $activation_period; ?> horas,de lo contrario quedara inhabilidato y debera
                comunicarse con el administrador del sitema.<br />
                <br />
                <br />
                <?php if (strlen($username) > 0) { ?>Usuario: <?php echo $username; ?><br /><?php } ?>
                Correo Electrónico: <?php echo $email; ?><br />
                <?php if (isset($password)) { ?> Contraseña: <?php echo $password; ?><br /><?php } ?>
                <br />
                <br />
                </td>
                </tr>
            </table>
        </div>
    </body>
</html>