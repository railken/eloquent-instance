<?php

namespace Railken\EloquentInstance;

use Illuminate\Database\Eloquent\Model;

trait HasRelationships
{
    /**
     * Create a new model instance for a related model.
     *
     * @param  string  $class
     * @return mixed
     */
    protected function newRelatedInstance($class)
    {
        return tap($this->avoidNewIfModel($class), function ($instance) {
            if (! $instance->getConnectionName()) {
                $instance->setConnection($this->connection);
            }
        });
    }

    /**
     * Avoid creating a new instance if the parameter sent is already a model
     *
     * @param  string  $class
     * @return mixed
     */
    protected function avoidNewIfModel($class)
    {
        if ($class instanceof Model) {
            return $class;
        }

        return new $class();
    }
}
