<?php

namespace comrade\Support\Storage;

use Countable;
use comrade\Support\Storage\Contracts\StorageInterface;

class SessionStorage implements StorageInterface, Countable
{
    protected $bucket;
    public function __construct($bucket = 'default')
    {
        if(!isset($_SESSION[$bucket])){
            $_SESSION[$bucket] = [];
        }

        $this->bucket = $bucket;
    }

    public function count()
    {
        // TODO: Implement count() method.
        return count($this->all());
    }

    public function get($index)
    {
        // TODO: Implement get() method.
        if(!$this->exists($index)){
            return null;
        }

        return $_SESSION[$this->bucket][$index];
    }

    public function set($index, $value)
    {
        // TODO: Implement set() method.
        $_SESSION[$this->bucket][$index] = $value;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $_SESSION[$this->bucket];
    }

    public function exists($index)
    {
        // TODO: Implement exists() method.
        return (bool) isset($_SESSION[$this->bucket][$index]);
    }

    public function unset($index)
    {
        // TODO: Implement reset() method.
        if ($this->exists($index)){
            unset($_SESSION[$this->bucket][$index]);
        }
    }

    public function clear()
    {
        // TODO: Implement clear() method.
        unset($_SESSION[$this->bucket]);
    }

}