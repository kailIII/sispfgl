<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>Olvido su contraseña del  <?php echo $site_name; ?></title></head>
    <body>
        <div style="max-width: 800px; margin: 0; padding: 30px 0;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="5%"></td>
                    <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                        <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Crear Nueva Contraseña</h2>
                        Si olvido su contraseña, basta con dar clic al siguiente link:<br />
                        <br />
                        <big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>" style="color: #3366cc;">Crear Nueva Contraseña</a></b></big><br />
                        <br />
                        Si el link anterior no funciona, por favor copiar el siguiente link en la barra de 
                        direcciones de su navegador y dirijase al formulario para cambiar la contraseña:
                       <br />
                <nobr><a href="<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?></a></nobr><br />
                <br />
                <br />
                Si usted no solicito el cambio de contraseña, ignore y elimine este mensaje.<br />
                <br />
                Atentamente,<br />
                <?php echo $site_name; ?>
                </td>
                </tr>
            </table>
        </div>
    </body>
</html>