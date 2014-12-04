<?php

class Mem_cached {

  function __construct() {
    $this -> cache = new Memcached();
    $this -> memcached = $this -> cache -> addServer('localhost', '11211');
  }
}