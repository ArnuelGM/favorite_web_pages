<?php

namespace App\UseCases;

use App\Models\Favorite;
use App\Repositories\Contracts\FavoriteRepositoryInterface;
use App\UseCases\Contracts\CreateFavoriteUseCaseInterface;

/**
 * Class CreateFavoriteUseCase
 * @package App\UseCases
 */
class CreateFavoriteUseCase implements CreateFavoriteUseCaseInterface
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favoriteRepository;

    /**
     * CreateFavoriteUseCase constructor.
     * @param FavoriteRepositoryInterface $favoriteRepository
     */
    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    /**
     * @param string $title
     * @param string $url
     * @param string $description
     * @param bool $visibility
     * @param int $userID
     * @return Favorite
     */
    public function handle(string $title, string $url, string $description, bool $visibility, int $userID): Favorite
    {
        $favorite = new Favorite();
        $favorite->title = $title;
        $favorite->url = $url;
        $favorite->description = $description;
        $favorite->visibility = $visibility;
        $favorite->user_id = $userID;

        return $this->favoriteRepository->create($favorite);
    }
}
