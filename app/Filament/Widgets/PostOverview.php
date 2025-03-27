<?php

namespace App\Filament\Resources;
namespace App\Filament\Widgets;

use App\Models\PostLike;
use App\Models\PostView;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class PostOverview extends Widget
{
    protected int | string | array $columnSpan = 2;

    public ?Model $record = null;

    protected function getViewData(): array
    {

        if (!$this->record) {
            return [
                'viewCount' => PostView::count(),
                'likeCount' => PostLike::count(),
            ];
        }


        return [
            'viewCount' => PostView::where('post_id', '=', $this->record->id)->count(),
            'likeCount' => PostLike::where('post_id', '=', $this->record->id)->count(),
        ];
    }

    protected static string $view = 'filament.widgets.post-overview';
}
