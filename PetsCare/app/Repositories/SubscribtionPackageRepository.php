<?php

namespace App\Repositories;

use App\Models\SubscribtionPackage;
use App\Repositories\BaseRepository;

/**
 * Class SubscribtionPackageRepository
 * @package App\Repositories
 * @version March 16, 2022, 2:30 pm UTC
*/

class SubscribtionPackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'subscribtion_package_name',
        'subscribtion_package_description',
        'activation_period',
        'subscribtion_package_price'
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
        return SubscribtionPackage::class;
    }
}
