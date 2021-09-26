<?php

namespace App\Http\Controllers\User;

use App\Exceptions\LoginUserException;
use App\Http\Requests\LoginUserFormRequest;
use App\UseCases\Contracts\LoginUserUseCaseInterface;
use Exception;
use Illuminate\Http\RedirectResponse;

/**
 * Class LoginUserController
 * @package App\Http\Controllers\User
 */
class LoginUserController
{
    /**
     * @var LoginUserUseCaseInterface
     */
    private $loginUserUseCase;

    /**
     * LoginUserController constructor.
     * @param LoginUserUseCaseInterface $loginUserUseCase
     */
    public function __construct(LoginUserUseCaseInterface $loginUserUseCase)
    {
        $this->loginUserUseCase = $loginUserUseCase;
    }

    /**
     * @param LoginUserFormRequest $request
     * @return RedirectResponse
     */
     public function __invoke(LoginUserFormRequest $request): RedirectResponse
     {
         $error = null;
         try {
             $this->loginUserUseCase->handle(
                 $request->get('email'),
                 $request->get('password')
             );
             return redirect()->route('favorite.dashboard');
         } catch (LoginUserException $exception) {
             $error = $exception->getMessage();
         } catch (Exception $exception) {
             $error = 'Error al iniciar sesión, intente de nuevo!';
         }

         return redirect()->back()->withErrors([
             'msg' => $error
         ]);
     }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home.public');
    }
}
