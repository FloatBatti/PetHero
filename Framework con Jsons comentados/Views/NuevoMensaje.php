<div class="contendora">
   
        <div>
            <h3>Enviar mensaje a</h3> 
            <h2><?php echo $nombre ?></h2>
        </div>
        <form class="contenedora-reply" action="../Mensaje/Add" method="post">
            <input type="number" name="id" class="destinatario" value="<?php echo $id ?>" readonly>
            <textarea name="chat" class="reply" maxlength="150" placeholder="max 150 caracteres" size="50" required></textarea> 
            <div class="boton">
                 <button type="submit" class="submit"><img src="../assets/img/dogboneEnviar.png"></button>
             </div>
        </form>

</div>