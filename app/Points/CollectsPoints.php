<?php

namespace App\Points;

use Exception;
use App\Points\Formatters\PointsFormatter;
use App\Points\Actions\ActionAbstract;
use App\Points\Models\Point;

trait CollectsPoints
{
    /**
     * [givePoints description]
     * @param  [type] $point [description]
     * @return [type]        [description]
     */
    public function givePoints(ActionAbstract $action){
        if(!$model = $action->getModel()){
            throw new Exception("Points model for key [{$action->key()}] not found.");
        }

        $this->pointsRelation()->attach($model);
    }

    /**
     * [points description]
     * @return [type] [description]
     */
    public function points(){
        return new PointsFormatter(
            $this->pointsRelation->sum('points')
        );
    }

    /**
     * [points description]
     * @return [type] [description]
     */
    public function pointsRelation(){
        return $this->belongsToMany(Point::class)
        ->withTimestamps();
    }
}
