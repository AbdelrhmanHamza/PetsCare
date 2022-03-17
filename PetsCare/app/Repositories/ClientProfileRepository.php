<?php

namespace App\Repositories;

use App\Models\ClientProfile;
use App\Repositories\BaseRepository;

/**
 * Class ClientProfileRepository
 * @package App\Repositories
 * @version March 16, 2022, 9:53 pm UTC
*/

class ClientProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'address',
        'phone_number'
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
        return ClientProfile::class;
    }
}
