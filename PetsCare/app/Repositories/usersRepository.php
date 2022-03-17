<?php

namespace App\Repositories;

use App\Models\users;
use App\Repositories\BaseRepository;

/**
 * Class usersRepository
 * @package App\Repositories
 * @version March 14, 2022, 10:26 pm UTC
*/

class usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_name',
        'email',
        'type',
        'password'
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
        return users::class;
    }
}
