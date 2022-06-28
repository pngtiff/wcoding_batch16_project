<?php
$title = "Reserve this property";
ob_start();?>
<br>
<body>
    <div class="creditCardForm">
        <div class="heading">
            <h1>Reservation Payment</h1>
        </div>
        <div class="payment">
            <form id="paymentForm" action="index.php" method="post">
                <p id="available">How long do you wish to stay?</p><br>
                <div class="checkIn">
                <label for="startDate" id="start">Check-in date</label>
                <input type="date" id="startDate" name="startDate" class="form-control">
                </div><br>
                <div class="checkOut">
                <label for="endDate" id="end">Check-out date</label>
                <input type="date" id="endDate" name="endDate" class="form-control">
                </div><br><br>

                <?php 
                    $date1 = 'startDate.value';
                    $date2 = 'endDate.value'
                ?>

                <div id=dateBtn>Click here for price</div><br><br>
                <?php 
                echo '<p>Total Cost of your stay: </p>'
                ?><br>
                <label for="owner">Cardholder</label>
                <input type="text" class="form-control" id="owner" name="owner" placeholder="Enter your name as shown on your credit card">
                <div class="nameError"><em>Please enter your name as shown on your credit card (only letters)</em></div><br>
                <label for="cardNumber" id="cardNum">Card #</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter credit card number with no spaces or dashes">
                <div class="numError"><em>Please enter a correct card number</em></div><br>
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Enter the 3 or 4 digit code on the back of your card">
                <div class="cvvError"><em>3 or 4 numbers only</em></div><br>
                <div class="expiry">
                    <label>Expiry</label>
                    <select name="month" id="month">
                        <option value="" selected disabled hidden>Select month</option>
                        <option value="01">January</option>
                        <option value="02">February </option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select name="year" id="year">
                        <option value="" selected disabled hidden>Select year</option>
                        <option value="22"> 2022</option>
                        <option value="23"> 2023</option>
                        <option value="24"> 2024</option>
                        <option value="25"> 2025</option>
                        <option value="26"> 2026</option>
                        <option value="27"> 2027</option>
                    </select>
                </div>
                    <div class="buttons">
                        <!-- <img src="public/images/Credit-Card-Icons.jpg" id="visa"> -->
                        <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm Payment</button>
                        <input type="hidden" value="addReservationInfo" name="action">
                        <button id="reset" type="reset">Reset the form</button>
                    </div>
                </form>
        </div>
    </div>
</body>
<script src="public/js/reservations.js"></script>

<?php
$content = ob_get_clean();
include('template.php');
?>