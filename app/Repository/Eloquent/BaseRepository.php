<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Helper;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(string $order = 'reference_number', string $by = 'desc'): Model
    {
        return $this->model->orderBy($order, $by)->get()->appends(request()->query());
    }

    public function getAllWithPaginate(string $order = 'reference_number', string $by = 'desc', int $perPage = 1): Model
    {
        return $this->model->orderBy($order, $by)->paginate($perPage)->appends(request()->query());
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function create(array $data): Collection
    {
        return Helper::convert_to_collection($this->model->create($data));
    }

    public function save(array $data): string
    {
        $model = $this->model->create($data);
        return $model->reference_number;
    }

    public function update(array $data, array $matchThese, string $order = 'updated_at' , string $by = 'desc'): Collection
    {
        $dataToBeUpdated = $this->model->where($matchThese);

        return $dataToBeUpdated->update($data) ? Helper::convert_to_collection($dataToBeUpdated->orderBy($order, $by)->first()) : collect();
    }

    public function delete(int $id): Int
    {
        return $this->model->destroy($id);
    }

    public function find(int $id, string $order = 'desc', string $by = 'reference_number'): Model
    {
        return $this->model->find($id)->orderBy($order, $by);
    }

    public function findOrFail(int $id, string $order = 'asc', string $by = 'reference_number'): Model
    {
        return $this->model->findOrFail($id)->orderBy($order, $by);
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @return Collection
     */
    public function where($matchThese): Collection
    {
        return $this->model->where($matchThese)->all();
    }

    /**
     * @return Collection
     */
    public function whereFirst($matchThese): Collection
    {
        $firstResult = Helper::convert_to_collection($this->model->where($matchThese)->first());
        return empty($firstResult) ? collect() : $firstResult;
    }
}