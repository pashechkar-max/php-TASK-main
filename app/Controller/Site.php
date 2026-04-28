<?php

namespace Controller;

use Model\Departments;
use Model\Issues;
use Model\Items;
use Model\Roles;
use Model\Staffs;
use Model\Supplies;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Site
{
    private function validationMessages(): array
    {
        return [
            'required' => 'Поле :field обязательно для заполнения',
            'unique' => 'Поле :field должно быть уникальным',
            'kiril' => 'Поле :field может содержать только кириллицу',
            'email' => 'Поле :field должно быть в формате email',
            'login' => 'Поле :field должно быть на латинице без спецсимволов',
            'password' => 'Поле :field должно содержать строчную, заглавную букву и цифру',
            'min' => 'Поле :field слишком короткое',
            'max' => 'Поле :field слишком длинное',
        ];
    }

    private function validationMessage(array $errors): string
    {
        $messages = [];
        foreach ($errors as $fieldErrors) {
            foreach ($fieldErrors as $error) {
                $messages[] = $error;
            }
        }

        return implode('<br>', $messages);
    }

    private function firstErrors(array $errors): array
    {
        $result = [];
        foreach ($errors as $field => $fieldErrors) {
            $result[$field] = $fieldErrors[0] ?? '';
        }

        return $result;
    }

    public function staffs(Request $request): string
    {

        $staff = Staffs::all();
        return (new View())->render('site.staffs', ['staffs' => $staff]);

    }

    public function user_delete(): void
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            app()->route->redirect('/staffs');
            return;
        }

        $staff = Staffs::where('user_id', $id)->first();
        if ($staff) {
            $staff->delete();
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        app()->route->redirect('/staffs');
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

    public function items(Request $request): string
    {
        $fields = array_merge([
            'search' => '',
        ], $request->all());

        $validator = new Validator($fields, [
            'search' => ['max:100'],
        ], $this->validationMessages());

        if ($validator->fails()) {
            return (new View())->render('site.Items', [
                'items' => Items::all(),
                'search' => $fields['search'],
                'message' => $this->validationMessage($validator->errors()),
            ]);
        }

        $query = $fields['search'];

        if (!empty($query)) {
            $items = Items::where('item_name', 'LIKE', "%$query%")
                ->orWhere('sku', 'LIKE', "%$query%")
                ->get();
        } else {
            $items = Items::all();
        }

        return (new View())->render('site.Items', [
            'items' => $items,
            'search' => $query,
        ]);
    }

    public function item_add(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        if ($request->method === 'POST') {
            $fields = array_merge([
                'sku' => '',
                'item_name' => '',
                'unit_of_measure' => '',
                'current_stock' => '',
                'min_threshold' => '',
            ], $request->all());

            $validator = new Validator($fields, [
                'sku' => ['required', 'login', 'min:3', 'max:40', 'unique:items,sku'],
                'item_name' => ['required', 'min:2', 'max:100'],
                'unit_of_measure' => ['required', 'kiril', 'max:10'],
                'current_stock' => ['required', 'min:1', 'max:10'],
                'min_threshold' => ['required', 'min:1', 'max:10'],
            ], $this->validationMessages());

            if ($validator->fails()) {
                return new View('site.item_add', [
                    'message' => $this->validationMessage($validator->errors()),
                    'errors' => $this->firstErrors($validator->errors()),
                    'old' => $fields,
                ]);
            }

            $item = new Items();

            $item->sku = $fields['sku'];
            $item->item_name = $fields['item_name'];
            $item->unit_of_measure = $fields['unit_of_measure'];
            $item->current_stock = $fields['current_stock'];
            $item->min_threshold = $fields['min_threshold'];

            $item->save();

            app()->route->redirect('/items');
        }

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
            $fields = array_merge([
                'surname' => $user->surname ?? '',
                'name' => $user->name ?? '',
                'patronymic' => $user->patronymic ?? '',
                'email' => $user->email ?? '',
                'birth_date' => $user->birth_date ?? '',
            ], $request->all());

            $validator = new Validator($fields, [
                'surname' => ['required', 'kiril', 'min:2', 'max:50'],
                'name' => ['required', 'kiril', 'min:2', 'max:50'],
                'patronymic' => ['kiril', 'max:50'],
                'birth_date' => ['required'],
                'email' => ['required', 'email', 'max:100'],
            ], $this->validationMessages());

            if ($validator->fails()) {
                $user->surname = $fields['surname'];
                $user->name = $fields['name'];
                $user->patronymic = $fields['patronymic'];
                $user->email = $fields['email'];
                $user->birth_date = $fields['birth_date'];

                return new View('site.profile_edit', [
                    'user' => $user,
                    'message' => $this->validationMessage($validator->errors()),
                    'errors' => $this->firstErrors($validator->errors()),
                ]);
            }

            $user->surname = $fields['surname'];
            $user->name = $fields['name'];
            $user->patronymic = $fields['patronymic'];
            $user->email = $fields['email'];
            $user->birth_date = $fields['birth_date'];

            if (!empty($_FILES['avatar']['name'])) {
                $avatar = $_FILES['avatar'];

                $allowed = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($avatar['type'], $allowed, true)) {
                    return new View('site.profile_edit', [
                        'user' => $user,
                        'message' => 'Поле avatar: допустимы только JPG, PNG или GIF',
                    ]);
                }

                $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
                $filename = uniqid('', true) . '.' . $ext;
                $destination = __DIR__ . '/../../public/uploads/avatars/' . $filename;

                if (!is_dir(dirname($destination))) {
                    mkdir(dirname($destination), 0755, true);
                }

                if (!move_uploaded_file($avatar['tmp_name'], $destination)) {
                    return new View('site.profile_edit', [
                        'user' => $user,
                        'message' => 'Поле avatar: не удалось загрузить файл',
                    ]);
                }

                $user->avatar = $filename;
            }

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

        $roles = Roles::all();

        if ($request->method === 'POST') {
            $fields = array_merge([
                'surname' => '',
                'name' => '',
                'patronymic' => '',
                'login' => '',
                'password' => '',
                'birth_date' => '',
                'email' => '',
                'role_id' => '',
            ], $request->all());

            $validator = new Validator($fields, [
                'surname' => ['required', 'kiril', 'min:2', 'max:50'],
                'name' => ['required', 'kiril', 'min:2', 'max:50'],
                'patronymic' => ['kiril', 'max:50'],
                'login' => ['required', 'login', 'min:3', 'max:30', 'unique:users,login'],
                'password' => ['required', 'password', 'min:8', 'max:64'],
                'birth_date' => ['required'],
                'email' => ['required', 'email', 'max:100', 'unique:users,email'],
                'role_id' => ['required'],
            ], $this->validationMessages());

            if ($validator->fails()) {
                return (string)new View('site.user_add', [
                    'roles' => $roles,
                    'errors' => $this->firstErrors($validator->errors()),
                    'message' => $this->validationMessage($validator->errors()),
                    'user' => (object)$fields,
                ]);
            }
            $user = new User();

            $user->surname = $fields['surname'];
            $user->name = $fields['name'];
            $user->patronymic = $fields['patronymic'];
            $user->login = $fields['login'];
            $user->email = $fields['email'];
            $user->password = $fields['password'];
            $user->birth_date = $fields['birth_date'];

            $user->save();

            $staff = new Staffs();

            $staff->user_id = $user->user_id;
            $staff->role_id = $fields['role_id'];

            $staff->save();

            app()->route->redirect('/staffs');
        }

        return (string)new View('site.user_add', [
            'roles' => $roles,
            'errors' => [],
            'user' => (object)[],
        ]);
    }


    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {
            $fields = array_merge([
                'surname' => '',
                'name' => '',
                'patronymic' => '',
                'birth_date' => '',
                'email' => '',
                'login' => '',
                'password' => '',
            ], $request->all());

            $validator = new Validator($fields, [
                'surname' => ['required', 'kiril', 'min:2', 'max:50'],
                'name' => ['required', 'kiril', 'min:2', 'max:50'],
                'patronymic' => ['kiril', 'max:50'],
                'birth_date' => ['required'],
                'email' => ['required', 'email', 'max:100', 'unique:users,email'],
                'login' => ['required', 'login', 'min:3', 'max:30', 'unique:users,login'],
                'password' => ['required', 'password', 'min:8', 'max:64'],
            ], $this->validationMessages());

            if ($validator->fails()) {
                return new View('site.signup', [
                    'message' => $this->validationMessage($validator->errors()),
                ]);
            }

            if (User::create($fields)) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.login');
        }

        $fields = array_merge([
            'login' => '',
            'password' => '',
        ], $request->all());

        $validator = new Validator($fields, [
            'login' => ['required', 'login', 'min:3', 'max:30'],
            'password' => ['required', 'min:1', 'max:64'],
        ], $this->validationMessages());

        if ($validator->fails()) {
            return new View('site.login', [
                'message' => $this->validationMessage($validator->errors()),
            ]);
        }

        if (Auth::attempt($fields)) {
            app()->route->redirect('/profile');
        }

        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/signup');
    }


}
