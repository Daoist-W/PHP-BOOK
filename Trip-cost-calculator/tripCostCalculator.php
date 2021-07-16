<!DOCTYPE html>
<html lang="">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Trip Cost Calculator</title>
 <link type="text/css" rel="stylesheet" href="css/script3_5-calculator.css" />
</head>
<body>
 <main>
 <?php 
 {
  # script 3.5 - calculator.php
  # created on 27/11/2020
  # created by Don K. Isiko
  
  // check for form submission 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   // Minimal form validation: 
   if(isset($_POST['distance'], $_POST['price'], $_POST['efficiency']) && is_numeric($_POST['distance']) && is_numeric($_POST['price']) && is_numeric($_POST['efficiency'])) {
    
    // calculate the results 
    $gallons = $_POST['distance'] / $_POST['efficiency'];
    $dollars = $gallons * $_POST['price'];
    $hours = $_POST['distance']/65;
    
    // print the results 
    echo '<div class="result">
         <p>The total cost of driving ' . $_POST['distance'] . ' miles, averaging ' . $_POST['efficiency'] . ' miles per gallon, and paying
         an average of $' . $_POST['price'] . 'per gallon, is $' . 
         number_format ($dollars, 2) . '. If you drive at an average of 65 
         miles per hour, the trip will take approximately ' . 
         number_format($hours, 2) . ' hours.</p></div>';
    
   } else { // invalid submitted values
    echo '<div class="result"> 
          <h1>Error!</h1>
          <p>Please enter a valid, distance, price and fuel efficiency.</p>
          </div>';
    
   }
    
  }
  
 }
 ?>
  <form action="" method="post" >
   <h1>Trip Cost Calculator</h1>
   <table>
    <tbody>
     <tr>
      <td>
       <p>Distance (in miles)</p>
      </td>
      <td>
       <label for="distance">
        <input 
               type="number" 
               name="distance" 
               value="<?php
                       // set up for sticky form 
                       if (isset($_POST['distance']) && is_numeric($_POST['distance'])) {
                        echo $_POST['distance'];     
                       }
                      ?>" /> 
       </label>
      </td>
     </tr>
     <tr>
      <td>
       <p>Ave. Price Per Gallon:</p>
      </td>
      <td>
       <label for="price">
        <input 
               type="radio" 
               name="price"
               value="3.00"
               <?php // set up for sticky form 
                       if (isset($_POST['price']) && $_POST['price'] == 3.00) {
                        echo 'checked';
                       } ?>
               /> 3.00
        <input 
               type="radio" 
               name="price" 
               value="3.50"
               <?php // set up for sticky form 
                       if (isset($_POST['price']) && $_POST['price'] == 3.50) {
                        echo 'checked';
                       } ?>               
               /> 3.50
        <input 
               type="radio" 
               name="price" 
               value="4.00"
               <?php // set up for sticky form 
                       if (isset($_POST['price']) && $_POST['price'] == 4.00) {
                        echo 'checked';
                       } ?>               
               /> 4.00
       </label>
      </td>
     </tr>
     <tr>
      <td>
       <p>Fuel Efficiency:</p>
      </td>
      <td>
       <label for="efficiency">
        <select name="efficiency">
         <option 
                 value="10"
                 <?php if ($_POST['efficiency'] == 10) {echo "selected";}?>
                 >Terrible</option>
         <option 
                 value="20"
                 <?php if ($_POST['efficiency'] == 20) {echo "selected";}?>
                 >Decent</option>
         <option 
                 value="30"
                 <?php if ($_POST['efficiency'] == 30) {echo "selected";}?>
                 >Very Good</option>
         <option 
                 value="50"
                 <?php if ($_POST['efficiency'] == 50) {echo "selected";}?>
                 >Outstanding</option>
        </select>
       </label>
      </td>
     </tr>
    </tbody>
   </table>

   <input 
          class="submit" 
          type="submit" 
          value="Submit to me!" 
          />
  </form> 
 </main>
</body>
</html>
