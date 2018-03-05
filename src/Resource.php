<?php

namespace Nilnice\Phalcon;

use Nilnice\Phalcon\Constant\Service;
use Phalcon\Di;

class Resource extends AbstractCollection
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $itemKey;

    /**
     * @var string
     */
    protected $modelPrimaryKey;

    /**
     * Set curd.
     *
     * @param string      $prefix
     * @param string|null $name
     *
     * @return $this|\Nilnice\Phalcon\AbstractCollection
     */
    public static function setCurd(string $prefix, string $name = null)
    {
        /** @var \Nilnice\Phalcon\Resource $resource */
        $resource = self::factory($prefix, $name);

        return $resource->setEndpoint(Endpoint::all())
            ->setEndpoint(Endpoint::find())
            ->setEndpoint(Endpoint::create())
            ->setEndpoint(Endpoint::update())
            ->setEndpoint(Endpoint::remove());
    }

    /**
     * @param string      $prefix
     * @param string|null $name
     *
     * @return Resource
     */
    public static function factory(
        string $prefix,
        string $name = null
    ) : Resource {
        $class = static::class;

        /** @var \Nilnice\Phalcon\Resource $resource */
        $resource = new $class($prefix);

        if (! $resource->getItemKey()) {
            $resource->setItemKey('items');
        }

        if ($name !== null && ! $resource->getName()) {
            $resource->setName($name);
        }

        if ($name) {
            $resource->setName($name);
        }

        return $resource;

    }

    /**
     * Set resource model.
     *
     * @param string $model
     *
     * @return \Nilnice\Phalcon\Resource
     */
    public function setModel(string $model) : self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel() : string
    {
        return $this->model;
    }

    /**
     * @param string $itemKey
     *
     * @return \Nilnice\Phalcon\Resource
     */
    public function setItemKey(string $itemKey) : self
    {
        $this->itemKey = $itemKey;

        return $this;
    }

    /**
     * Get item key.
     *
     * @return string
     */
    public function getItemKey() : string
    {
        return $this->itemKey;
    }

    /**
     * Get model primary key.
     *
     * @return null|string
     */
    public function getModelPrimaryKey() : ? string
    {
        if (! $this->model) {
            return null;
        }

        if (! $this->modelPrimaryKey) {
            /** @var \Phalcon\Mvc\Model\MetaData $metaData */
            $metaData = Di::getDefault()->get(Service::MODELS_METADATA);

            $model = $this->model;
            $this->modelPrimaryKey = $metaData->getIdentityField(new $model);
        }

        return $this->modelPrimaryKey;
    }
}