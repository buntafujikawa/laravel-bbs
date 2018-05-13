<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

// TODO エラー処理、バリデーション、ポリシーの設定
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::take(5)->get()->keyBy('id');
    }

    public function store(Request $request)
    {
        // saveがnullになっている
        return Task::create($request->only('name'))->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return mixed
     */
    public function update(Request $request, int $id)
    {
        return Task::find($id)->fill($request->only('is_done'))->save()->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return int
     */
    public function destroy(int $id)
    {
        return Task::destroy($id);
    }
}
