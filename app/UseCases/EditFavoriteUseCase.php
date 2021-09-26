<?php

namespace App\UseCases;

use App\Exceptions\EditFavoriteException;
use App\Models\Favorite;
use App\Repositories\Contracts\FavoriteRepositoryInterface;
use App\UseCases\Contracts\EditFavoriteUseCaseInterface;

/**
 * Class EditFavoriteUseCase
 * @package App\UseCases
 */
class EditFavoriteUseCase implements EditFavoriteUseCaseInterface
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favoriteRepository;

    /**
     * EditFavoriteUseCase constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     */
    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * @inheritDoc
     */
    public function handle(int $favoriteID, string $title, string $url, string $description, bool $visibility, string $userID): Favorite
    {
        $favorite = $this->favoriteRepository->findByID($favoriteID);
        if (empty($favorite)) {
            throw new EditFavoriteException('Favorito no encontrado!');
        }

        if ($favorite->title == ucwords(strtolower($title))) {
            throw new EditFavoriteException('Este titulo ya se encuentra registrado!');
        }

        if ($favorite->user_id != $userID) {
            throw new EditFavoriteException('Usted no puede editar este favorito!');
        }

        $favorite->title = $title;
        $favorite->url = $url;
        $favorite->description = $description;
        $favorite->visibility = $visibility;
        return $this->favoriteRepository->edit($favorite);
    }
}
