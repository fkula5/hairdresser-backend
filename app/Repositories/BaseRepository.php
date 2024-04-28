<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function getAll(){
        return $this->model->all();
    }
    public function create(array $data){
        return $this->model->create($data);
    }
    public function update(array $data, $id){
        return $this->model->where;
    }
    public function delete($id){
        return $this->model->destroy($id);
    }
    public function find($id){
        return $this->model->find($id);
    }
}
