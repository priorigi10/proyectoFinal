<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/newLog.css" />

</head>

<body>



    <div class="form-style-3">            
        <fieldset><legend>Informe</legend>
            <?php echo form_open('Welcome/createLogSubUser', 'id="createLogSubUser"'); ?>
                <label for="game"><span>Juego: <span class="required"></span></span><input type="text" class="input-field" name="game" value="" /></label>
                <label for="subject"><span>Asunto: <span class="required"></span></span><input type="text" class="input-field" name="subject" value="" /></label>
                <label for="amount"><span>Generado: <span class="required"></span></span><input type="number" class="input-field" name="amount" value="" /></label>

                <label for="type"><span>Tipo: </span><select name="type" class="select-field">
                    <option value="0">Criptomoneda</option>
                    <option value="1">NFT</option>
                    <option value="2">otro</option>
                </select></label>
                <label for="message"><span>Descripcion: <span class="required"></span></span><textarea name="message" class="textarea-field"></textarea></label>
                <input type='hidden' name='idSubUser' id='idSubUser' value='<?=$ID_SUBUSER?>' />
                <input type='hidden' name='idGrant' id='idGrant' value='<?=$ID_GRANT?>' />
                <label class="buttonsCenter"><input type="submit" class="buttonsCenter" value="Enviar" /></label>
                <?php echo form_close(); ?>
                <?php echo form_open('Welcome/cancelLogSubUser', 'id="cancelLogSubUser"'); ?>
                    <input type='hidden' name='idSubUser' id='idSubUser' value='<?=$ID_SUBUSER?>' />
                    <label class="buttonsCenter">
                        <input type="submit" class="buttonsCenter" value="Cancelar" />
                    </label>
                <?php echo form_close(); ?>
            </fieldset>

        </form>
    </div>










    <script src="<?php echo base_url(); ?>js/newLog.js"></script>
    <footer>
        <h4>
            <p>
                Hecho por: <a href="https://es.linkedin.com/in/carlos-llorente-llorente-43869a147" target="_blank">Carlos Ll.</a>
            </p>
        </h4>
    </footer>


</body>

</html>