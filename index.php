<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include "lib/AddressBook.php";
$currentPath = __DIR__;
$pathToData = "{$currentPath}/data";
$pathToClasses = "{$currentPath}/lib";

$ab = new AddressBook($pathToData);
$cities = $ab->getCities();
$persons = $ab->getPersons();
$addresses = $ab->getAddresses();
$provinces = $ab->getProvinces();
//$ab->findAllPersonsByCityId(2);
//print_r($ab->findAddressWithName("Ararat"));
//
//echo "Another awesome string<br>";

?>

<html lang="en">
<head>
    <title>Addressbook</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AddressBook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<br> <br> <br>
<h3 align="center">Cities</h3>
<br>
<div class="container", class = "porc">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Province</th>
            <th scope="col">Population</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cities as $city) { ?>
        <tr>
            <th scope="row"><?php echo $city->getId() ?></th>
            <td><?php echo $city->getName() ?></td>
            <td><?php echo $city->province->getName() ?></td>
            <td><?php echo $city->getPopulation() ?></td>
        </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
    <br><br>
<h3 align="center">Persons</h3>
<br>
    <div class="container">
    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Province</th>
        </tr>
        <?php foreach ($persons as $person) {?>
        <tr>
            <td><?php echo $person->getId() ?></td>
            <td><?php echo $person->getName() ?></td>
            <td><?php echo $person->getAddressId() ?></td>
            <td><?php echo $person->getCityId() ?></td>
            <td><?php echo $person->getProvinceId()  ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

    <br> <br>
<h3 align="center">Addresses</h3>
<br>
    <div class="container">
        <table class="table">
            <tr>
                <th scope="col">Id </th>
                <th scope="col">Address </th>
                <th scope="col">City </th>
            </tr>
            <?php foreach ($addresses as $address) { ?>
            <tr>
                <td><?php echo $address->getId() ?>  </td>
                <td><?php echo $address->getName() ?>  </td>
                <td><?php echo $address->getCityId() ?>  </td>
            </tr>
            <?php } ?>
        </table>

    </div>
<br> <br>
<h3 align="center">Provinces</h3>
<br>
    <div class="container">
        <table class="table">
            <tr>
                <th scope="col"> Id </th>
                <th scope="col"> Name </th>
            </tr>
            <?php foreach ($provinces as $province)  ?>
            <tr>
                <td><?php echo $province->getId() ?></td>
                <td><?php echo $province->getName() ?></td>
            </tr>
        </table>


    </div>
</body>
</html>
