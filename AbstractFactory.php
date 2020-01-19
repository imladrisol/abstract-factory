<?php

namespace abstract_factory;

class Cafe
{
    /**
     * @param string $country
     */
    public function createComplexnObed($country)
    {
        /** @var Cuisine $obj */
        try {
            $obj = null;
            if ($country == 'america') {
                $obj = new AmericanCuisine();
            } else if ($country == 'ukr') {
                $obj = new UkrCuisine();
            } else {
                throw new \Exception("\nthere is no such a cuisine");
            }
            return $obj->createCuisine();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}

abstract class Cuisine
{
    abstract public function createCuisine();

    /**
     * @param string $dish
     * @throws \Exception
     */
    public function createDish($dish)
    {
        $obj = null;
        if ($dish == 'burger') {
            $obj = new Burger();
        } else if ($dish == 'borsch') {
            $obj = new Borsch();
        } else if ($dish == 'cola') {
            $obj = new Cola();
        } else {
            throw new \Exception("\nthere is no such a dish");
        }
        return $obj->cook();
    }
}

class AmericanCuisine extends Cuisine
{
    public function __construct()
    {
        echo "\n**************\n American cuisine:";
    }

    public function createCuisine()
    {
        try {
            $this->createDish('burger');
            $this->createDish('cola');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}

class UkrCuisine extends Cuisine
{
    public function __construct()
    {
        echo "\n**************\n Ukr cuisine:";
    }

    public function createCuisine()
    {
        try {
            $this->createDish('borsch');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}


interface Dish
{
    public function cook();
}

class Borsch implements Dish
{
    public function cook()
    {
        echo "\nborsch cooking";
    }
}

class Burger implements Dish
{
    public function cook()
    {
        echo "\nburger cooking";
    }
}

class Cola implements Dish
{
    public function cook()
    {
        echo "\ncola cooking";
    }
}


$cafe = new Cafe();
$cafe->createComplexnObed('america');
$cafe->createComplexnObed('ukr');
