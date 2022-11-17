<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function show($id)
    {
        $table = User::find($id);
        if($table) {
            return $table;
        }else {
            return ['message' => 'Customer Not Found'];
        }
    }

    public function update(Request $request, $id)
    {
        $table = User::find($id);
        if($table) {
            $table->name = $request->name ? $request->name : $table->name;
            $table->email = $request->email ? $request->email : $table->email;
            $table->password = $request->password ? bcrypt($request->password) : $table->password;
            $table->save();

            return $table;
        }else {
            return ['message' => 'Customer Not Found'];
        }
    }

    public function destroy($id)
    {
        $table = User::find($id);
        if($table) {
            $table->delete();
            return ['message' => 'Customer Data Has Been Successfully Deleted'];
        }else {
            return ['message' => 'Customer Not Found'];
        }
    }
}
