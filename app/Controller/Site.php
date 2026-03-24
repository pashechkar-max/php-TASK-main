<?php

namespace Controller;

use Model\Staffs;
use Model\Items;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
    public function staffs(): string
    {
        $staff = Staffs::all();
        return (new View())->render('site.staffs', ['staffs' => $staff]);
    }

    public function items(): string
    {
        $items = Items::all();
        return (new View())->render('site.items', ['items' => $items]);
    }

    public function home()
    {
        // Создаем объект и сразу просим его отрисовать шаблон в строку
        return (new View())->render('site.home');
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'full_name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/home');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/signup');
    }


}

