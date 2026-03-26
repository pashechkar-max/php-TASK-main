<?php

namespace Controller;

use Model\Staffs;
use Model\Items;
use Model\Supplies;
use Model\Departments;
use Model\Issues;
use Model\Roles;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
    public function staffs(Request $request): string
    {
//        $person = Auth::user();
//        if ($person->staff->role_id != 1) {
//            app()->route->redirect('/');
//        }

        $staff = Staffs::all();
        return (new View())->render('site.staffs', ['staffs' => $staff]);

    }

    public function issues(): string
    {
        $issue = Issues::all();
        return (new View())->render('site.issues', ['issues' => $issue]);
    }

    public function departments(): string
    {
        $department = Departments::all();
        return (new View())->render('site.departments', ['departments' => $department]);
    }


    public function items(): string
    {
        $items = Items::all();
        return (new View())->render('site.items', ['items' => $items]);
    }

    public function item_add(Request $request): string
    {
        // Проверка авторизации (по желанию можно оставить)
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        // Если форма отправлена
        if ($request->method === 'POST') {

            // Валидация (можешь упростить или расширить)
            $validator = new Validator($request->all(), [
                'sku' => ['required'],
                'item_name' => ['required'],
                'unit_of_measure' => ['required'],
                'current_stock' => [],
                'min_threshold' => []
            ], [
                'required' => 'Поле :field пусто'
            ]);

            if ($validator->fails()) {
                return new View('site.items_add', [
                    'message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)
                ]);
            }

            // Создание товара
            $item = new Items();

            $item->sku = $request->sku;
            $item->item_name = $request->item_name;
            $item->unit_of_measure = $request->unit_of_measure;
            $item->current_stock = $request->current_stock;
            $item->min_threshold = $request->min_threshold;

            $item->save();

            // Редирект после добавления
            app()->route->redirect('/items');
        }

        // Просто отображение формы
        return new View('site.item_add');
    }

    public function supplies(): string
    {
        $supply = Supplies::all();
        return (new View())->render('site.supplies', ['supplies' => $supply]);

    }

    public function profile(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }
        return new View('site.profile');
    }

    public function profile_edit(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }

        $user = Auth::user();
        if ($request->method === 'POST') {

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;

            $user->save();

            app()->route->redirect('/profile');
        }

        return new View('site.profile_edit', ['user' => $user]);
    }

    public function user_add(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();

        if ($request->method === 'POST') {

            $user = new User();

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->login = $request->login;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->birth_date = $request->birth_date;
            $user->role_id = $request->role_id;

            $user->save();

            app()->route->redirect('/staffs');
        }

        $roles = Roles::all();

        return (string)new View('site.user_add', [
            'roles' => $roles,
        ]);
    }


    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'surname' => ['required'],
                'name' => ['required'],
                'patronymic' => [],
                'birth_date' => ['required'],
                'email' => ['required'],
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
            app()->route->redirect('/profile');
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

