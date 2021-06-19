<?php

namespace Windsurf437\FotkaPL;

use Windsurf437\FotkaPL\Request;

class Fotka
{
    public function __construct()
    {
        $this->m_api = new RestApi($this->m_API_URL);

    }

    public function login(string $login, string $password, Response & $response=null) : bool {
        $request = new Request();
        $request->setMethods(['user','login']);
        $request->setParameters(['login'=>$login,'password'=>$password]);

        if(!$this->m_api->sendGet($request,$response))
        {
            return false;
        };

        $this->m_auth_login = $login;
        $this->m_auth_password = $password;
        $this->m_auth_session = $response->getObject()->sessid;

        return true;
    }
    public function getOnlineUsers(string $gender,int $age_start,int $age_end, int $limit = 4500,Response & $response=null)
    {
        $request = new Request();
        $request->setMethods(['site','online']);
        $request->setParameters([
            'gender'=>$gender,
            'ageStart'=>$age_start,
            'ageEnd'=>$age_end,
            'limit'=>$limit,
            'sessid'=>$this->m_auth_session]);

        if(!$this->m_api->sendGet($request,$response))
        {
            return false;
        };


        return true;
    }

    private string $m_API_URL = 'https://api.fotka.com/v2/';
    private RestApi $m_api;

    private string $m_auth_login;
    private string $m_auth_password;
    private string $m_auth_session;


    public static string $GENDER_MALE='male';
    public static string $GENDER_FEMALE='female';
    public static string $GENDER_ALL='all';



}