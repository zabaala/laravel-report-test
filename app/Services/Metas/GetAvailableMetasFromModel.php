<?php

namespace App\Services\Metas;

use App\Models\Website;
use App\Services\ServiceException;
use App\Services\ServiceInterface;

class GetAvailableMetasFromModel implements ServiceInterface
{
    /**
     * List with all available models to discover available
     * fields that will be used as a Report Meta.
     *
     * @var array
     */
    protected $availableModels = [
        'website' => Website::class
    ];

    /**
     * @var string
     */
    private $modelName;

    /**
     * GetAvailableMetasFromModel constructor.
     *
     * @param string $modelName
     * @throws ServiceException
     */
    public function __construct(string $modelName)
    {
        if (! array_key_exists($modelName, $this->availableModels)) {
            throw new ServiceException("The model '${modelName}' is not available.");
        }

        $this->modelName = $modelName;
    }

    /**
     * The service handler.
     *
     * @return mixed
     * @throws ServiceException
     */
    public function run()
    {
        $class = $this->availableModels[$this->modelName];

        try {
            return (new \ReflectionProperty($class, 'reportAttributes'))->getValue();
        } catch (\ReflectionException $e) {
            throw new ServiceException($e->getMessage());
        }
    }
}
