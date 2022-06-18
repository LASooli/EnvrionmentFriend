<?php

function addReviewForm($xmlFileName) {

    if (isset($_SESSION['authenticatedUser'])) {

        echo "<form action='addReview.php' method='POST'>";

        echo " <input type='hidden' name='xmlFileName' value='$xmlFileName'>";


// Rest of the form goes in here
        echo"
        <label for='rating'>Leave a Review:</label>
            <select name='rating' id='rating'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
               
        <input type='submit' name ='submit' value='Submit'> 
        </form>
        ";


    }

}
