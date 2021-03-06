<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface BaseRepositoryInterface
* @package App\Repositories
*/
interface BaseRepositoryInterface
{
   public function getAll(string $order, string $by);

   public function getAllWithPaginate(string $order, string $by, int $perPage);

   public function create(array $data) : Collection;

   public function save(array $data);

   public function update(array $data, array $matchThese) : Collection;

   public function delete(int $id);

   public function find(int $id, string $order, string $by);

   public function findOrFail(int $id, string $order, string $by);

   public function getModel() : Model;

   /**
    * @return Collection
    */
   public function all(): Collection;

   /**
    * @return Collection
    */
   public function where($matchThese): Collection;

   /**
     * @return Collection
     */
    public function whereFirst($matchThese) : Collection;
}