<?php

namespace App\Repository\Kata7;

use App\Http\Requests\Kata7\StringEndRequest;
use App\Interfaces\RepositoryInterface;
use App\Models\Kata7\StringEnd;

class StringEndRepository implements RepositoryInterface
{
    /**
     * @return StringEnd[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return StringEnd::all();
    }

    /**
     * @param int $id
     * @return StringEnd
     */
    public function getById(int $id): StringEnd
    {
        return StringEnd::find($id);
    }

    /**
     * @param int $id
     * @param StringEndRequest $updatDetailsRequest
     * @return bool
     */
    public function update(int $id, StringEndRequest $updateDetailsRequest): bool
    {
        $stringEndUpdateRecord = $this->getById($id);
        $stringEndUpdateRecord->fill($updateDetailsRequest->all());
        $dirtyValuesArray = $stringEndUpdateRecord->getDirty();

        if (count($dirtyValuesArray) > 0) {
            StringEnd::whereId($id)->update($updateDetailsRequest->except(['_token']));
            return true;
        }
        return false;
    }

    /**
     * @param array $stringEndDetails
     * @return StringEnd
     */
    public function create(array $stringEndDetails): StringEnd
    {
        return StringEnd::create($stringEndDetails);
    }
}
