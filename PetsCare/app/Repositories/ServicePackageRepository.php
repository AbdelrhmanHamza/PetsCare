<?php

namespace App\Repositories;

use App\Models\ServicePackage;
use App\Repositories\BaseRepository;

/**
 * Class ServicePackageRepository
 * @package App\Repositories
 * @version March 16, 2022, 2:14 pm UTC
*/

class ServicePackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'package_name',
        'package_description',
        'package_price'
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
        return ServicePackage::class;
    }
}
