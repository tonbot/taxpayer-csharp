<div class="tab-pane fade show bg-white py-4" id="nav-addPayment" role="tabpanel" aria-labelledby="nav-addPayment-tab" tabindex="0">
    <?php if ($tccdata['level1_status_id'] == 4 || $tccdata['level2_status_id'] == 4 || $tccdata['level3_status_id'] == 4 || $tccdata['level4_status_id'] == 4) : ?>
        <div>
            <button class="btn btn-secondary shadow-sm" id="addNewPayment" type="button">Add New Payment</button>
        </div>

    <?php endif ?>

    <div class="app-container">
        <h5 class="text-left pb-4">Additional Payment</h5>


        <?php
        $counter = 1; // Initialize a counter for generating unique IDs
        ?>

        <?php foreach ($addPayments as $addPayment) : ?>
            <div class="row mb-5">
                <div class="col-md-4">
                    <label for="directAssessment" class="form-label">Direct Assessment</label>
                    <input type="text" class="form-control"
                        value="<?= htmlspecialchars($addPayment['dirAssessment']); ?>"
                        onblur="checkReceipt(this, '#daddDirYearName<?= $counter; ?>', '#daddDirYearAmount<?= $counter; ?>', '#daddDirYearPurpose<?= $counter; ?>', '#daddDirYearDate<?= $counter; ?>', '#daddDirYearerror<?= $counter; ?>', '.daddDiryear<?= $counter; ?>')"
                        readonly>
                    <small id="daddDirYearerror<?= $counter; ?>" class="form-text text-muted"></small>
                    <div class="daddDiryear<?= $counter; ?> d-none app-container">
                        <p>Name: <small id="daddDirYearName<?= $counter; ?>" class="form-text text-muted"></small></p>
                        <p>Amount: <input id="daddDirYearAmount<?= $counter; ?>" class="form-text text-muted input-no-border"></input></p>
                        <p>Revenue Type: <small id="daddDirYearPurpose<?= $counter; ?>" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="daddDirYearDate<?= $counter; ?>" class="form-text text-muted"></small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="developmentLevy" class="form-label">Development Levy</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($addPayment['devLevy']); ?>"
                        onblur="checkReceipt(this, '#daddDevYearName<?= $counter; ?>', '#daddDevYearAmount<?= $counter; ?>', '#daddDevYearPurpose<?= $counter; ?>', '#daddDevYearDate<?= $counter; ?>', '#daddDevYearerror<?= $counter; ?>', '.daddDevyear<?= $counter; ?>')"
                        readonly>
                    <small id="daddDevYearerror<?= $counter; ?>" class="form-text text-muted"></small>
                    <div class="daddDevyear<?= $counter; ?> d-none app-container">
                        <p>Name: <small id="daddDevYearName<?= $counter; ?>" class="form-text text-muted"></small></p>
                        <p>Amount: <input id="daddDevYearAmount<?= $counter; ?>" class="form-text text-muted input-no-border"></input></p>
                        <p>Revenue Type: <small id="daddDevYearPurpose<?= $counter; ?>" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="daddDevYearDate<?= $counter; ?>" class="form-text text-muted"></small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="year" class="form-label">Year</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($addPayment['forYear']); ?>" readonly>
                </div>
            </div>
            <?php $counter++; // Increment counter for the next row 
            ?>
        <?php endforeach; ?>


    </div>
</div>