<?php
$frutas = array("manzana", "pera", "naranja");

if (in_array("pera", $frutas)) {
    echo "La pera está en el array";
} else {
    echo "La pera no está en el array";
}
print("<br/>");

$products = [
    ['name' => 'Laptop', 'price' => 1000],
    ['name' => 'T-shirt', 'price' => 20],
    ['name' => 'Smarthpone', 'price' => 800]
];

//Filtrar productos con precio mayor a 500
// array_filter() elimina elementos del array 
$expensiveProducts = array_filter($products, function ($product) {
    return $product['price'] > 500;
});

//Aplicar un descuento del 10% a los productos filtrados
// array_map() cambia los elementos del array, devuelve el array modificado
$discountedProducts = array_map(function ($product) {
    $product['price'] *= 0.9;
    return $product;
}, $expensiveProducts);

// print_r() para mostrar un array 
print_r($products);
print('<br/>');
print_r($expensiveProducts);
print('<br/>');
print_r($discountedProducts);
print('<br/>');
