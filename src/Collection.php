<?php

namespace Nilnice\Phalcon;

use Nilnice\Phalcon\Support\Arr;

class Collection extends AbstractCollection
{
    /**
     * @var array
     */
    protected $allowRoles = [];

    /**
     * @var array
     */
    protected $denyRoles = [];

    /**
     * Collection constructor.
     *
     * @param string $prefix
     */
    public function __construct(string $prefix)
    {
        parent::setPrefix($prefix);

        if (method_exists($this, 'initialize')) {
            $this->initialize();
        }
    }

    /**
     * @param string      $prefix
     * @param string|null $name
     *
     * @return \Nilnice\Phalcon\Collection
     */
    public static function factory(
        string $prefix,
        string $name = null
    ) : Collection {
        $class = static::class;

        /** @var \Nilnice\Phalcon\Collection $collection */
        $collection = new $class($prefix);

        if ($name) {
            $collection->setName($name);
        }

        return $collection;
    }

    /**
     * Set the main handler.
     *
     * @param string $handler
     * @param bool   $lazy
     *
     * @return $this
     */
    public function setRegisterHandler(
        string $handler,
        bool $lazy = true
    ) : self {
        $this->setHandler($handler, $lazy);

        return $this;
    }

    /**
     * Allows access to this endpoint for role with the given names.
     *
     * @param ...array $roles
     *
     * @return \Nilnice\Phalcon\Collection
     */
    public function setAllowRoles() : self
    {
        $roles = Arr::flatten(\func_get_args());
        foreach ($roles as $role) {
            if (! \in_array($roles, $this->allowRoles, true)) {
                $this->allowRoles[] = $role;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getAllowRoles() : array
    {
        return $this->allowRoles;
    }

    /**
     * Denies access to this endpoint for role with the given names.
     *
     * @param ...array $roles
     *
     * @return $this
     */
    public function setDenyRoles() : self
    {
        $roles = Arr::flatten(\func_get_args());
        foreach ($roles as $role) {
            if (! \in_array($roles, $this->denyRoles, true)) {
                $this->denyRoles[] = $role;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getDenyRoles() : array
    {
        return $this->denyRoles;
    }


}