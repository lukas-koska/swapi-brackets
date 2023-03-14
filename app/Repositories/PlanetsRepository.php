<?php

namespace App\Repositories;

use App\Models\News;
use DateTime;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PlanetsRepository.
 */
class PlanetsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return News::class;
    }

    /**
     * @param array $planets
     * @return bool
     */
    public function syncPlanets(array $planets) : bool
    {
        return true;
    }

    /**
     * @return array<News>|null
     */
    public function getTodayNews(): ?array
    {
        $today = new DateTime('now');
        $language = app()->getLocale();
        $news = DB::table('news')
            ->where('language', $language)
            ->where('date', '>=', $today)
            ->orWhere('due_date', '>=', $today)
            ->orderBy('date')
            ->get();
        $newsArray = $news->toArray();
        foreach ($newsArray as $key => $new) {
            $newsArray[$key]->date = new DateTime($newsArray[$key]->date);
        }
        return $newsArray;
    }
}
