<?php

class AddNamesProc {
    private $names = [];

    public function addClearNames() {
        if (isset($_POST['addNamesButton'])) {
            $name = $_POST['name'];
            $this->addName($name);
        } elseif (isset($_POST['clearNamesButton'])) {
            $this->clearNames();
        }

        return $this->stylizeNames();
    }

    private function addName($name) {
        if(!empty($name)){
        $this->names[] = $name;
        sort($this->names);
    }
}

    private function clearNames() {
        $this->names = [];
    }

    private function stylizeNames() {
        //sort($this->names);

        $stylizeNames = [];
        foreach ($this->names as $name) {
            $parts = explode(' ', $name);
            $stylizeNames[] = end($parts) . ', ' . reset($parts);
        }
        return implode("\n", $stylizeNames);
    }
}
?>