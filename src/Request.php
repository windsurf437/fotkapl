<?php


namespace Windsurf437\FotkaPL;


class Request
{

    private array $m_methods;
    private array $m_parameters;

    public function setMethods(array $methods): void
    {
        $this->m_methods = $methods;
    }


    public function setParameters(array $parameters): void
    {
        $this->m_parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->m_parameters;
    }

    public function getMethods(): array
    {
        return $this->m_methods;
    }
}