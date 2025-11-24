
<?php 

include("./config/db_config.php");


// Create a php function that will accept
// book as a function parameter 
// call sql $conn and insert the book 
// into classimodels database book table


$book = array(
    "title"=>"World war 3", 
    "author"=>"Ram hari",
    "isbnno" => "",
    "publisher" => "Sunway",
    "publication_year" => "2015-04-12",
    "price" => 525.43,
    "genre" => "Thriller"
);



function insertBook($book, $conn) {
    // write a logic to insert book
    // if successful echo book created successfuly
    $sql = "INSERT INTO book (title, author, isbnno, publisher, publication_year, price, genre) 
        VALUES ('{$book['title']}', '{$book['author']}', '{$book['isbnno']}', 
                '{$book['publisher']}', '{$book['publication_year']}', 
                '{$book['price']}', '{$book['genre']}')";

 
   
    if($conn->query($sql) === TRUE) {
        echo "Book inserted successfully";
    }
 

}

// call function here 
insertBook($book, $conn);


$customer1 = array(
    "customerNumber" => 101,
    "customerName" => "Everest Traders",
    "contactLastName" => "Sharma",
    "contactFirstName" => "Ramesh",
    "phone" => "9841000001",
    "addressLine1" => "Kalimati",
    "addressLine2" => "",
    "city" => "Kathmandu",
    "state" => "Bagmati",
    "postalCode" => "44600",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1501,
    "creditLimit" => 50000
);

$customer2 = array(
    "customerNumber" => 102,
    "customerName" => "Himalayan Exports",
    "contactLastName" => "Gurung",
    "contactFirstName" => "Sita",
    "phone" => "9841000002",
    "addressLine1" => "Lakeside",
    "addressLine2" => "",
    "city" => "Pokhara",
    "state" => "Gandaki",
    "postalCode" => "33700",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1502,
    "creditLimit" => 62000
);

$customer3 = array(
    "customerNumber" => 103,
    "customerName" => "Dharan Supplies",
    "contactLastName" => "Rai",
    "contactFirstName" => "Kamal",
    "phone" => "9841000003",
    "addressLine1" => "Basantapur",
    "addressLine2" => "",
    "city" => "Dharan",
    "state" => "Koshi",
    "postalCode" => "56700",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1503,
    "creditLimit" => 45000
);

$customer4 = array(
    "customerNumber" => 104,
    "customerName" => "Lumbini Traders",
    "contactLastName" => "Thapa",
    "contactFirstName" => "Anita",
    "phone" => "9841000004",
    "addressLine1" => "Main Road",
    "addressLine2" => "",
    "city" => "Butwal",
    "state" => "Lumbini",
    "postalCode" => "32907",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1504,
    "creditLimit" => 52000
);

$customer5 = array(
    "customerNumber" => 105,
    "customerName" => "Birat Wholesale",
    "contactLastName" => "Singh",
    "contactFirstName" => "Arjun",
    "phone" => "9841000005",
    "addressLine1" => "Bus Park",
    "addressLine2" => "",
    "city" => "Biratnagar",
    "state" => "Koshi",
    "postalCode" => "56613",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1505,
    "creditLimit" => 70000
);

$customer6 = array(
    "customerNumber" => 106,
    "customerName" => "Janakpur Bazaar",
    "contactLastName" => "Yadav",
    "contactFirstName" => "Manoj",
    "phone" => "9841000006",
    "addressLine1" => "Ramananda Chowk",
    "addressLine2" => "",
    "city" => "Janakpur",
    "state" => "Madhesh",
    "postalCode" => "45600",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1506,
    "creditLimit" => 38000
);

$customer7 = array(
    "customerNumber" => 107,
    "customerName" => "Nepal Auto Parts",
    "contactLastName" => "Shrestha",
    "contactFirstName" => "Dipesh",
    "phone" => "9841000007",
    "addressLine1" => "Teku",
    "addressLine2" => "",
    "city" => "Kathmandu",
    "state" => "Bagmati",
    "postalCode" => "44700",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1507,
    "creditLimit" => 90000
);

$customer8 = array(
    "customerNumber" => 108,
    "customerName" => "Makalu Hardware",
    "contactLastName" => "Lama",
    "contactFirstName" => "Nima",
    "phone" => "9841000008",
    "addressLine1" => "Nepalgunj Road",
    "addressLine2" => "",
    "city" => "Surkhet",
    "state" => "Karnali",
    "postalCode" => "21700",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1508,
    "creditLimit" => 48000
);

$customer9 = array(
    "customerNumber" => 109,
    "customerName" => "Buddha Traders",
    "contactLastName" => "KC",
    "contactFirstName" => "Suresh",
    "phone" => "9841000009",
    "addressLine1" => "Airport Road",
    "addressLine2" => "",
    "city" => "Nepalgunj",
    "state" => "Lumbini",
    "postalCode" => "21900",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1509,
    "creditLimit" => 56000
);

$customer10 = array(
    "customerNumber" => 110,
    "customerName" => "Karnali Stores",
    "contactLastName" => "Bhandari",
    "contactFirstName" => "Prakash",
    "phone" => "9841000010",
    "addressLine1" => "Main Market",
    "addressLine2" => "",
    "city" => "Nepalgunj",
    "state" => "Lumbini",
    "postalCode" => "21900",
    "country" => "Nepal",
    "salesRepEmployeeNumber" => 1509,
    "creditLimit" => 56000
);

$customers = array(
    $customer1,
    $customer2,
    $customer3,
    $customer4,
    $customer5,
    $customer6
);




function insertCustomer($customers, $conn) {
    // on calling this function 
    // use $conn->prepare to insert list of customer available in 
    // $customers array

}

insertCustomer($customers, $conn);



?>