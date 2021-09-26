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
     * @inheritDoc
     */
    public function handle(
        string $title,
        string $url,
        string $description,
        bool $visibility,
        int $userID,
        array $categories
    ): Favorite {
        $favorite = new Favorite();
        $favorite->title = $title;
        $favorite->url = $url;
        $favorite->description = $description;
        $favorite->visibility = $visibility;
        $favorite->user_id = $userID;

        $favorite = $this->favoriteRepository->create($favorite);
        $this->associateCategories($favorite, $categories);
        return $this->favoriteRepository->create($favorite);
    }

    private function associateCategories(Favorite $favorite, array $categories): void
    {
        $this->favoriteRepository->associateCategories($favorite, $categories);
    }
}
