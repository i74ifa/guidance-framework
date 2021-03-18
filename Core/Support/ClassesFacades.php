<?php


namespace Core\Support;


class ClassesFacades
{


    public function directory($name)
    {
        return config("app.$name");
    }


    public function generate()
    {

    }
}