<?php if (count($reservations)) { ?>
    <div id="cancellationModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="cancellationContent">
                Do you want to cancel ?
                <div>
                    <button class="confirmButton">Yes</button>
                    <button class="closeBttn">No</button>
                </div>
            </div>
        </div>
    </div>
    <div id="cancellation">
        <div>
            <div>Reservation Number</div>
            <div>Start Date</div>
            <div>End Date</div>
            <div>Total price</div>
        </div>
    <?php foreach($reservations as $reservation){?>
        <form action="index.php" method="post">
            <a href="index.php?action=property&propId=<?=$reservation['property_id']?>"><?= $reservation['reservation_num']?></a>
            <span><?= str_replace('-', '/', $reservation['start_date'])?></span>
            <span><?= str_replace('-', '/', $reservation['end_date'])?></span>
            <span><?= number_format($reservation['total_payment_won'])?>₩</span>
            <button id="cancelReservation">Cancel Reservation</button>
            <input name="reservation_num" type="hidden" value="<?= $reservation['reservation_num']?>">
            <input name="action" type="hidden" value="cancelReservation">
        </form>
        <?php }?>
    </div>
    <script src="./public/js/cancellationModal.js"></script>
<?php }?>