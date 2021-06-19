<?php


namespace Windsurf437\FotkaPL;


class RestApi
{
    public function __construct(string $a_url)
    {
        $this->m_API_URL = $a_url;
    }

    public function sendGet(Request $request, Response & $response = null) : bool
    {
        $serialized_parameters = $this->serializeParameters($request->getParameters());
        $serialized_methods = $this->serializeMethods($request->getMethods());

        $full_url = $this->m_API_URL.$serialized_methods.$serialized_parameters;

        $response = new Response(file_get_contents($full_url));

        if($response->getObject()->status =='OK') {
            return true;
        }

        return false;
    }

    private string $m_API_URL;

    private function serializeParameters(array $parameters) : string {
        $serialized_parameters = '?';

        foreach ($parameters as $key=>$value)
        {
            $serialized_parameters .= $key.'='.$value.'&';
        }

        substr($serialized_parameters,0,-1);
        return $serialized_parameters;
    }

    private function serializeMethods(array $methods):string {
        $serialized_methods= '';

        foreach ($methods as $method){
            $serialized_methods .= $method.'/';
        }
        substr($serialized_methods,0,-1);
        return $serialized_methods;
    }
}