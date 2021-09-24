<?php

namespace App\Http\Controllers\User;

use App\Exceptions\CreateUserException;
use App\Http\Requests\CreateUserFormRequest;
use App\Models\User;
use App\UseCases\Contracts\CreateUserUseCaseInterface;
use Egulias\EmailValidator\Exception\ExpectingQPair;
use Exception;
use Illuminate\Http\Request;

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
     */
    public function __invoke(CreateUserFormRequest $request)
    {
        $error = null;
        try {
            $user = $this->createUserUseCase->handle(
                $request->get('name'),
                $request->get('email'),
                $request->get('password')
            );

            dd($user);
        } catch (CreateUserException $exception) {
            $error = ($exception->getMessage());
        } catch (Exception $exception) {
            $error = ('Error no controlado');
        }

        return redirect()->back()->withErrors([
            'msg' => $error
        ]);
    }
}
