<?php

namespace Webkul\Chatter\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait HasLogActivity
{
    /**
     * Boot the trait
     */
    public static function bootHasLogActivity()
    {
        static::created(fn (Model $model) => $model->logModelActivity('created'));
        static::updated(fn (Model $model) => $model->logModelActivity('updated'));

        if (method_exists(static::class, 'bootSoftDeletes')) {
            static::deleted(function (Model $model) {
                if (method_exists($model, 'trashed') && $model->trashed()) {
                    $model->logModelActivity('soft_deleted');
                } else {
                    $model->logModelActivity('hard_deleted');
                }
            });
            static::restored(fn (Model $model) => $model->logModelActivity('restored'));
        } else {
            static::deleting(fn (Model $model) => $model->logModelActivity('deleted'));
        }
    }

    /**
     * Log model activity
     */
    public function logModelActivity(string $event): ?Model
    {
        $user = filament()->auth()->user();

        try {
            $changes = $this->determineChanges($event);

            if (collect($changes)->isEmpty()) {
                return null;
            }

            return $this->addMessage([
                'type'         => 'notification',
                'log_name'     => 'default',
                'body'         => $this->generateActivityDescription($event),
                'subject_type' => $this->getMorphClass(),
                'subject_id'   => $this->getKey(),
                'causer_type'  => $user->getMorphClass(),
                'causer_id'    => $user->id,
                'event'        => $event,
                'properties'   => $changes,
            ]);
        } catch (\Exception $e) {
            report($e);

            return null;
        }
    }

    // Other methods remain unchanged...

    /**
     * Sort array recursively
     */
    protected static function ksortRecursive(&$array)
    {
        if (! is_array($array)) {
            return;
        }

        ksort($array);

        foreach ($array as &$value) {
            if (is_array($value)) {
                static::ksortRecursive($value);
            }
        }
    }

    /**
     * Generate activity description
     */
    protected function generateActivityDescription(string $event): string
    {
        $modelName = Str::headline(class_basename(static::class));

        return match ($event) {
            'created'      => __('chatter::traits/has-log-activity.activity-log-failed.events.created', [
                'model' => $modelName,
            ]),
            'updated'      => __('chatter::traits/has-log-activity.activity-log-failed.events.updated', [
                'model' => $modelName,
            ]),
            'deleted'      => __('chatter::traits/has-log-activity.activity-log-failed.events.deleted', [
                'model' => $modelName,
            ]),
            'soft_deleted' => __('chatter::traits/has-log-activity.activity-log-failed.events.soft-deleted', [
                'model' => $modelName,
            ]),
            'hard_deleted' => __('chatter::traits/has-log-activity.activity-log-failed.events.hard-deleted', [
                'model' => $modelName,
            ]),
            'restored'     => __('chatter::traits/has-log-activity.activity-log-failed.events.restored', [
                'model' => $modelName,
            ]),
            default        => $event
        };
    }
}
