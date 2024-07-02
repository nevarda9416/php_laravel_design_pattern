<?php

namespace App\Services;

use App\Repositories\Object\User\UserRepository;

class UserService
{
    /**
     * UserService constructor.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($limit)
    {
        $top_users = $this->userRepository->getTopUsers($limit);
        $users = $this->userRepository->all();

        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('user.show', ['user' => $user]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store($request)
    {
        $data = $request->all();
        $this->userRepository->create($data);
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();

        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update($request, $id)
    {
        $data = $request->all();
        $this->userRepository->update($id, $data);
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();

        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        $top_users = $this->userRepository->getTopUsers($this->limit);
        $users = $this->userRepository->all();

        return view('user.index', ['top_users' => $top_users, 'users' => $users]);
    }

    /**
     * @return |null
     */
    public function getName($name)
    {
        return $this->userRepository->getName($name);
    }

    /**
     * @return |null
     */
    public function getOtherName()
    {
        return $this->userRepository->getOtherName();
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->userRepository->count();
    }
}
