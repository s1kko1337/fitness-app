<?php

namespace App\Http\Controllers;

use App\Actions\Trainers\DeleteTrainer;
use App\Actions\Trainers\ListTrainers;
use App\Actions\Trainers\ShowTrainer;
use App\Actions\Trainers\StoreTrainer;
use App\Actions\Trainers\UpdateTrainer;
use App\DTO\CreateTrainerData;
use App\DTO\TrainerData;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = ListTrainers::run();
        return $this->listResourceResponse(UserResource::collection($trainers));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainerRequest $request)
    {
        $gym = StoreTrainer::run(CreateTrainerData::fromRequest($request, 'test123', ));
        return $this->resourceCreated(UserResource::make($gym));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->showResourceResponse(UserResource::make(ShowTrainer::run($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id,UpdateTrainerRequest $request, )
    {
        $trainerId = UpdateTrainer::run($id,$request);
        return $this->show($trainerId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DeleteTrainer::run($id);
        return $this->deleteResource();
    }
}
