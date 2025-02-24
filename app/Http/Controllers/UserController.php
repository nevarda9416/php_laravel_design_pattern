<?php

namespace App\Http\Controllers;

use App\Events\ServerCreated;
use App\Events\UserRegistered;
use App\Facades\Process;
use App\Helpers\HttpHelper\Response;
use App\Jobs\CreateUser;
use App\Jobs\SendEmailUsingRedisQueue;
use App\Models\Posts;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var int
     */
    protected $limit = 10;

    /**
     * UserController constructor.
     */
    public function __construct(UserService $userService)
    {
        return $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $user = User::find(1);
        // Old: Traditional
        $user->name = 'Admin';
        $user->save();
        // New: Modern
        $property = 'name';
        $user->$property = 'Admin';
        $method = 'save';
        $result = $user->$method();
        if ($result) {
            return redirect()->to('/');
        }

        return redirect()->to('/');
    }

    public function register(Request $request)
    {
        $user = app(Response::class)->postData('/users', $request->all());
        // Fire the UserRegistered event
        event(new UserRegistered($user));
        $user = User::find(1);
        // Old: Traditional
        $user->name = 'Admin';
        $user->save();
        // New: Modern
        $property = 'name';
        $user->$property = 'Admin';
        $method = 'save';
        $result = $user->$method();
        if ($result) {
            return redirect()->to('dang-nhap');
        }

        return redirect()->to('dang-nhap');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Chỉ áp dụng cho single connection
        $job = (new CreateUser)->onQueue('create_user')->delay(Carbon::now()->addMinutes(1));
        $this->dispatch($job);
        echo '<pre/>';
        /**
         * Traditional: $posts = Posts::all();
         * Each loop we execute another select query and getting all comments
         * So when ever are displaying 50 records then it's fire 50 query behind
         */
        /**
         * Eager loading: $posts = Posts::with('comments')->get();
         * We can prevent and instead of this more queries we can fire only one query and save database memory
         */
        // With where condition
        $posts = Posts::with(['comments' => function ($query) {
            $query->where([
                ['id', '<', 10],
            ]);
        }])->get();
        foreach ($posts as $post) {
            echo $post->title.'<br/>';
            $comments = $post->comments;
            foreach ($comments as $comment) {
                echo $comment->posts_id.'<br/>';
            }
        }
        $event = new ServerCreated(['id' => '1'], 'Init broadcasting');
        print_r($event);
        $fullname = $this->userService->getName('Peter đại đế');
        echo $fullname.'<br/>';
        $othername = $this->userService->getOtherName();
        echo $othername.'<br/>';
        // Facade
        Process::process();
        // Dispatch job
        $details = [
            'name' => 'DAO TIEN TU',
            'email' => 'daotientu@gmail.com',
        ];
        $job = (new SendEmailUsingRedisQueue($details)); //->delay(Carbon::now()->addMinutes(60));
        dispatch($job)->onQueue('email');

        return $this->userService->index($this->limit);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->userService->count();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return $this->userService->show($id);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        return $this->userService->store($request);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        return $this->userService->update($request, $id);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        return $this->userService->destroy($id);
    }
}
