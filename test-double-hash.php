<?php
use Illuminate\Support\Facades\Hash;
$user = App\Models\User::create([
    'name'=>'Test2',
    'mobile'=>'8888888888',
    'password'=>Hash::make('password123'),
    'email'=>'test2@test.com'
]);
var_dump(Auth::attempt(['mobile'=>'8888888888','password'=>'password123']));
var_dump(Hash::check(Hash::make('password123'), $user->password));
var_dump(Hash::needsRehash($user->password));
