<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

// 1º forma de utlizar o namespace

require __DIR__ . "/classes/App/Template.php";
require __DIR__ . "/classes/Web/Template.php";

$appTemplate = new App\Template();
$webTemplate = new Web\Template();

var_dump(
    $appTemplate,
    $webTemplate
);

// 2º forma de utlizar o namespace

use App\Template;
use Web\Template AS WebTemplate; // Renomeando para que não haja confilto por ter o mesmo nome

$appUseTemplate = new Template();
$webUseTemplate = new WebTemplate();

var_dump(
    $appTemplate,
    $webTemplate
);
/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require __DIR__ . "/source/Qualified/User.php";

$user = new \Source\Qualifield\User();

// $user->setFirstName("Ricardo");
// $user->setLasttName("Barbosa");

var_dump(
    $user,
    get_class_methods($user)
);

echo "<p>O e-mail de {$user->getFirstName()} é {$user->getLasttName()}</p>";

/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);
