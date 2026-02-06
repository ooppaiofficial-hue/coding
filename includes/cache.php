<?php

namespace YourNamespace;  // Replace with actual namespace

class Cache {
    private $transient;

    public function __construct($transient) {
        $this->transient = $transient;
    }

    public function set($key, $value, $ttl = 3600) {
        // Set the data in transient
        $this->transient->set($this->getNamespacedKey($key), $value, $ttl);
    }

    public function get($key) {
        // Get the data from transient
        return $this->transient->get($this->getNamespacedKey($key));
    }

    public function delete($key) {
        // Delete the transient
        $this->transient->delete($this->getNamespacedKey($key));
    }

    private function getNamespacedKey($key) {
        return 'your_namespace_' . $key; // Change 'your_namespace_' accordingly
    }

    public function handleError($key) {
        // Automatically invalidate cache on error
        $this->delete($key);
    }
}

// Example usage
// $cache = new Cache($transient);
// $cache->set('example_key', 'example_value');
// $value = $cache->get('example_key');
// $cache->handleError('example_key');
?>