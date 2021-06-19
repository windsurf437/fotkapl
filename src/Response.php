<?php


namespace Windsurf437\FotkaPL;


class Response
{
    public function __construct(string $raw =null)
    {
        if($raw == null)
            return;

        $this->raw =$raw;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }

    public function getObject() :\stdClass
    {
        return json_decode($this->raw);
    }

    private string $raw;
}