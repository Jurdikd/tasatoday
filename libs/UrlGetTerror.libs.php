<?php
class UrlGetTerror
{
    public static function Getjson()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}
