<?php

namespace Source\Interpretation;

class Product
{
    public $name;
    private $price;
    private $inaccessibleData;

    public function __set($name, $value)
    {
        $this->notFound(__FUNCTION__, $name);
        $this->inaccessibleData[$name] = $value;
    }

    public function __get($name)
    {
        if (!empty($this->inaccessibleData[$name])) {
            return $this->inaccessibleData[$name];
        } else {
            $this->notFound(__FUNCTION__, $name);
        }
    }

    public function __isset($name)
    {
        $this->notFound(__FUNCTION__, $name);
    }

    public function __call($name, $arguments)
    {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
    }

    public function __toString()
    {
        return "<p class='trigger'>Esse é um objeto da classe " . __CLASS__ . "</p>";
    }

    public function handler($name, $price)
    {
        $this->name = $name;
        $this->price = "R$ " . number_format($price, "2", ",", ".");
    }

    private function notFound($method, $name)
    {
        echo "<p class='trigger error'>{$method}: A propriedade {$name} não existe em " . __CLASS__ . "</p>";
    }
}
