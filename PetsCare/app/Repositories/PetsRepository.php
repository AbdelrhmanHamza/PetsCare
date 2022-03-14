<?php

namespace App\Repositories;

use App\Models\Pets;
use App\Repositories\BaseRepository;

/**
 * Class PetsRepository
 * @package App\Repositories
 * @version March 14, 2022, 10:17 pm UTC
*/

class PetsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_profile_id',
        'pet_type',
        'pet_breed',
        'pet_age',
        'has_medical_condition'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pets::class;
    }
}
