<?php

namespace Tests\Weew\Collections\Mocks;

use Weew\Contracts\IArrayable;

class ArrayableItem implements IArrayable {
    private $id;
    public function __construct($id) {
        $this->id = $id;
    }
    public function toArray() {
        return ['id' => $this->id];
    }
}
