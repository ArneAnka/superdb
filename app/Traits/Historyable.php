<?php

namespace App\Traits;

use App\History;
use App\ColumnChange;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

trait Historyable {

    /**
     * [bootHistoryable description]
     * @return [type] [description]
     */
    public static function bootHistoryable(){
         static::updated(function(Model $model){
            collect($model->getWantedChangedColums($model))->each(function ($change) use ($model) {
                $model->saveChange($change);
            });
        });
    }

    /**
     * [save description]
     * @return [type] [description]
     */
    protected function saveChange(ColumnChange $change){
        $this->history()->create([
            'changed_column' => $change->column,
            'changed_value_from' => $change->from,
            'changed_value_to' => $change->to,
        ]);
    }

    /**
     * [getWantedChangedColums description]
     * @param  Model  $model [description]
     * @return [type]        [description]
     */
     protected function getWantedChangedColums(Model $model){
        return collect(
            array_diff(
                Arr::except($model->getChanges(), $this->ignoreHistoryColumns()),
                $original = $model->getOriginal()
            )
        )->map(function($change, $column) use ($original){
            return new ColumnChange($column, Arr::get($original, $column), $change);
        });
    }

    /**
     * [history description]
     * @return [type] [description]
     */
    public function history(){
        return $this->morphMany(History::class, 'historyable')->latest();
    }

    /**
     * [ignoreHistoryColumns description]
     * @return [type] [description]
     */
    public function ignoreHistoryColumns() {
        return [
            'updated_at',
            'password'
        ];
    }
    
}
