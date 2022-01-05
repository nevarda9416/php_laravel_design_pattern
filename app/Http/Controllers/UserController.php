<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var
     */
    protected $userRepository;
    protected $limit = 10;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();
        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return view('user.show', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->userRepository->create($data);
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();
        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->userRepository->update($id, $data);
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();
        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();
        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }
}
