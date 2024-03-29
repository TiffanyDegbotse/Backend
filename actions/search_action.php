<?php
// Include the connection file
include '../settings/connection.php';
function display_search()
{
    global $conn;
    // Check if the search query parameter is set
    if (isset($_GET['search'])) {
        // Sanitize the search query
        $search_query = $_GET['search'];

        $sql = "SELECT * FROM products p JOIN categories c ON p.category=c.categoryid  WHERE ProductName = '$search_query'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $product = mysqli_fetch_assoc($result);
            if ($product) {
                // Return the product details in HTML format
                echo "
                <tr>
                    <td>". $product['ProductID']." </td>
                    <td>". $product['ProductName']." </td>
                    <td> ". $product['SKU']." </td>
                    <td>". $product['categoryname']." </td>
                    <td>". $product['QuantityInStock']." </td>
                    <td>". $product['LocationInShop']." </td>
                    <td>". $product['ProductDescription']." </td>
                    <td>
                     <a href='#' onclick='editProduct(\"{$product['ProductID']}\", \"{$product['ProductName']}\", \"{$product['SKU']}\", \"{$product['Category']}\", \"{$product['QuantityInStock']}\", \"{$product['LocationInShop']}\", \"{$product['ProductDescription']}\")'><button class='edit-product-btn'>Edit</button></a>
                     <a href='../actions/delete_product_action.php?product_id='".$product['ProductID']."'><button class='delete-product-btn'>Delete</button></a>
                    </td>
                </tr>
                ";
                
            } else {
                echo "Product not found";
            }
        } else {
            echo "Error executing search query";
        }
    }
}