<?php

namespace App\Repositories;

use App\Models\BusinessProfile;
use App\Repositories\BaseRepository;

/**
 * Class BusinessProfileRepository
 * @package App\Repositories
 * @version March 14, 2022, 10:41 pm UTC
*/

class BusinessProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'business_type',
        'business_name',
        'address',
        'phone_number',
        'service_description',
        'open_at',
        'close_at'
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
        return BusinessProfile::class;
    }
}
