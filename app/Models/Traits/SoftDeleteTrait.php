 <?php namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;

trait SoftDeleteTrait
{
      protected static function bootCascadeSoftDeletes()
	    {
	        static::deleting(function ($model) {
	            if (! $model->implementsSoftDeletes()) {
	                throw new LogicException(sprintf(
	                    '%s does not implement Illuminate\Database\Eloquent\SoftDeletes',
	                    get_called_class()
	                ));
	            }

	            if ($invalidCascadingRelationships = $model->hasInvalidCascadingRelationships()) {
	                throw new LogicException(sprintf(
	                    '%s [%s] must exist and return an object of type Illuminate\Database\Eloquent\Relations\Relation',
	                    str_plural('Relationship', count($invalidCascadingRelationships)),
	                    join(', ', $invalidCascadingRelationships)
	                ));
	            }

	            foreach ($model->getCascadingDeletes() as $relationship) {
	                $model->{$relationship}()->delete();
	            }
	        });
	    }

    protected function implementsSoftDeletes()
    {
        return in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this));
    }

    protected function hasInvalidCascadingRelationships()
    {
        return array_filter($this->getCascadingDeletes(), function ($relationship) {
            return ! method_exists($this, $relationship) || ! $this->{$relationship}() instanceof Relation;
        });
    }

    protected function getCascadingDeletes()
    {
        return isset($this->cascadeDeletes) ? (array) $this->cascadeDeletes : [];
    }
}