<?php
trait MyTraitFunctions {
    public function displayUsers() {
        $company = $this->getCompany();

        $names = $this->getNames(); // Calls the getNames method of the User class
        foreach ($names as $key => $name) {
            echo "<p>" . ($key + 1) . ". $name</p>";
        }
    }
}
?>
