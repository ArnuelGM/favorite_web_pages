<?php

namespace App\Http\Controllers\User;

use App\Exceptions\CreateUserException;
use App\Http\Requests\CreateUserFormRequest;
use App\UseCases\Contracts\CreateUserUseCaseInterface;
use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class CreateUserController
 * @package App\Http\Controllers\User
 */
class CreateUserController
{
    /**
     * @var CreateUserUseCaseInterface
     */
    private $createUserUseCase;

    /**
     * CreateUserController constructor.
     * @param CreateUserUseCaseInterface $createUserUseCase
     */
    public function __construct(CreateUserUseCaseInterface $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    /**
     * @param CreateUserFormRequest $request
     * @return RedirectResponse
     */
    public function __invoke(CreateUserFormRequest $request): RedirectResponse
    {
        $error = null;
        try {
            $user = $this->createUserUseCase->handle(
                $request->get('name'),
                $request->get('email'),
                $request->get('password')
            );

            session()->flash('success', 'Usuario creado con éxito');
            return redirect()->route('login.form')->withInput(['email' => $user->email]);
        } catch (CreateUserException $exception) {
            $error = $exception->getMessage();
        } catch (Exception $exception) {
            $error = 'Error no controlado';
        }

        return redirect()->back()->withErrors([
            'msg' => $error
        ]);
    }
}
