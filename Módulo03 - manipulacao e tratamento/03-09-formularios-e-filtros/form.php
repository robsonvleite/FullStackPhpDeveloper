<form name="post" action="./" method="<?= $form->method; ?>" enctype="multipart/form-data">
    <p style="margin-bottom: 10px; text-align: right"><a href="./" title="Atualizar">Atualizar</a></p>
    <div class="col2">
        <input type="text" name="name" value="<?= $form->name; ?>" placeholder="Nome:"/>
        <input type="email" name="mail" value="<?= $form->mail; ?>" placeholder="E-mail:"/>
    </div>
    <button>Enviar Agora!</button>
</form>