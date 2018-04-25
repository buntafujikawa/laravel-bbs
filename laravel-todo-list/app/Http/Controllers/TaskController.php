<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * タスクリポジトリーインスタンス
     * $var TaskRepository
     */
    protected $tasks;

    /**
     * TaskController constructor.
     * $return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // バリデーションに失敗したら、自動で直前のページにリダイレクトしてエラーもセッションへフラッシュデータとして保存
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        // タスクの作成
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return Response
     * @throws \Exception
     */
    public function destroy(Request $request, Task $task)
    {
        // TaskPolicyのdestroyメソッド
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
