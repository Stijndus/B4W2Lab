<?php

function getAllEmployees()
{
    // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
    // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
    // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
    try {
        // Open de verbinding met de database
        $conn = openDatabaseConnection();

        // Zet de query klaar door middel van de prepare method
        $stmt = $conn->prepare("SELECT * FROM employees");

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
        // hier de fetchAll functie.
        $result = $stmt->fetchAll();

    }
    // Vang de foutmelding af
     catch (PDOException $e) {
        // Zet de foutmelding op het scherm
        echo "Connection failed: " . $e->getMessage();
    }

    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;

    // Geef het resultaat terug aan de controller
    return $result;
}

function getEmployee($id)
{
    try {

        $conn = openDatabaseConnection();

        $stmt = $conn->prepare("SELECT * FROM employees WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $result = $stmt->fetch();

    } catch (PDOException $e) {

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

    return $result;
}

function createEmployee($data)
{
    try {

        $conn = openDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO employees(`name`, `age`) VALUES (:name, :age)");

        $stmt->bindParam(":name", $data[0]);
        $stmt->bindParam(":age", $data[1]);

        $stmt->execute();


    } catch (PDOException $e) {

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;


}

function updateEmployee($data)
{
    try {

        $conn = openDatabaseConnection();

        $stmt = $conn->prepare("UPDATE employees SET name=:name, age=:age, id=:id");

        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":name", $data['name']);
        $stmt->bindParam(":age", $data['age']);

        $stmt->execute();

        $result = $stmt->fetch();

    } catch (PDOException $e) {

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

    return $result;
}

function deleteEmployee($id)
{
    try {

        $conn = openDatabaseConnection();

        $stmt = $conn->prepare("DELETE FROM employees WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

    } catch (PDOException $e) {

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

}
