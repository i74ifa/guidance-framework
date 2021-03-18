<?php

namespace Core;



class Blueprint
{
    public function request($para)
    {
        return (isset($_GET[$para]) ? $_GET[$para] : null);
    }
}