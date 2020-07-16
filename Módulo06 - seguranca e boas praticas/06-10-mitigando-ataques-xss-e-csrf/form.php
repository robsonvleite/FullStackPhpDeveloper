<form name="post" action="./" method="post" enctype="multipart/form-data" autocomplete="off" novalidate>
    <input type="text" name="first_name" value="<?= ($data->first_name ?? ""); ?>" placeholder="Primeiro nome:"/>
    <input type="text" name="last_name" value="<?= ($data->last_name ?? ""); ?>" placeholder="Sobrenome:"/>
    <input type="email" name="email" value="<?= ($data->email ?? ""); ?>" placeholder="E-mail:"/>
    <input type="password" name="password" value="<?= ($data->password ?? ""); ?>" placeholder="Senha:"/>
    <button>Cadastre-se</button>
</form>