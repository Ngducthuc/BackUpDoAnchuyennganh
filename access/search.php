<?php
// Include Database class
include "../admin/Database.php";

// Check if search query is set
if(isset($_GET['q'])) {
    // Get search query
    $search_query = $_GET['q'];

    // Create Database object
    $db = new Database();

    // Query to search products based on product name
    $sql_search = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search_query%'";
    $result_search = $db->select($sql_search);

    // Check if there are any search results
    if($result_search && $result_search->num_rows > 0) {
        // Display search results
        while($row = $result_search->fetch_assoc()) {
            echo "<p>".$row['product_name']."</p>";
            // Display other product details as needed
        }
    } else {
        // No search results found
        echo "<p>No results found</p>";
    }
}
?>
