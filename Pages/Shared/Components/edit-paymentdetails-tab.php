<div class="tab-pane fade show bg-white py-4" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">

    <div class="d-flex justify-content-between">
        <!-- <h5>Personal Details</h5> -->
    </div>
    <div class="line"></div>
    <!-- <div class="alert alert-warning text-center">
        <p>The payment details form includes two fields: Direct Assessment and Development Levy.</p>
        <p>You are required to enter the receipt numbers for each of your payments.</p>
    </div> -->
    <form class="py-4 app-container" id="paymentDetailsForm">
    <h5 class="text-left pb-4">Payment Information</h5>

    <!-- Year 1 -->
    <div class="form-group mb-5">
        <!-- <label for="year1">Year <?= intval($tccdata['application_year']) - 3 ?? '' ?></label> -->
        <div class="row">
            <div class="col-md-4">
                <label for="directAssessment" class="form-label">Direct Assessment</label>
                <input type="text" value="<?= $tccdata['dirTaxYear1'] ?? '' ?>" class="form-control" id="dirTaxYear1" name="dirTaxYear1"
                       placeholder="Direct Tax Receipt Number" required
                       onblur="checkReceipt(this, '#dirYear1Name','#dirYear1Amount','#dirYear1Purpose','#dirYear1Date','#dirYear1error','.diryear1')" readonly>
                <small id="dirYear1error" class="form-text text-muted"></small>
                <div class="diryear1 d-none">
                    <p>Name: <small id="dirYear1Name" class="form-text text-muted"></small></p>
                    <p>Amount: <input type="text" id="dirYear1Amount" name="dirYear1Amount" class="form-text text-muted input-no-border" readonly></p>
                    <p>Revenue Type: <small id="dirYear1Purpose" class="form-text text-muted"></small></p>
                    <p>Payment Date: <small id="dirYear1Date" class="form-text text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-4">
                <label for="developmentLevy" class="form-label">Development Levy</label>
                <input type="text" value="<?= $tccdata['devLevyYear1'] ?? '' ?>" class="form-control" id="devLevyYear1" name="devLevyYear1"
                       placeholder="Development Levy Receipt Number" required
                       onblur="checkReceipt(this, '#devYear1Name','#devYear1Amount','#devYear1Purpose','#devYear1Date','#devYear1error','.devyear1')" readonly>
                <small id="devYear1error" class="form-text text-muted"></small>
                <div class="devyear1 d-none">
                    <p>Name: <small id="devYear1Name" class="form-text text-muted"></small></p>
                    <p>Amount: <input type="text" id="devYear1Amount" name="devYear1Amount" class="form-text text-muted input-no-border" readonly></p>
                    <p>Revenue Type: <small id="devYear1Purpose" class="form-text text-muted"></small></p>
                    <p>Payment Date: <small id="devYear1Date" class="form-text text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($tccdata['application_year'] - 3) ?>" readonly>
            </div>
        </div>
    </div>

    <!-- Year 2 -->
    <div class="form-group mb-5">
        <!-- <label for="year2">Year <?= intval($tccdata['application_year']) - 2 ?? '' ?></label> -->
        <div class="row">
            <div class="col-md-4">
                <label for="directAssessment" class="form-label">Direct Assessment</label>
                <input type="text" value="<?= $tccdata['dirTaxYear2'] ?? '' ?>" class="form-control" id="dirTaxYear2" name="dirTaxYear2"
                       placeholder="Direct Tax Receipt Number" required
                       onblur="checkReceipt(this, '#dirYear2Name','#dirYear2Amount','#dirYear2Purpose','#dirYear2Date','#dirYear2error','.diryear2')" readonly>
                <small id="dirYear2error" class="form-text text-muted"></small>
                <div class="diryear2 d-none">
                    <p>Name: <small id="dirYear2Name" class="form-text text-muted"></small></p>
                    <p>Amount: <input type="text" id="dirYear2Amount" name="dirYear2Amount" class="form-text text-muted input-no-border" readonly></p>
                    <p>Revenue Type: <small id="dirYear2Purpose" class="form-text text-muted"></small></p>
                    <p>Payment Date: <small id="dirYear2Date" class="form-text text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-4">
                <label for="developmentLevy" class="form-label">Development Levy</label>
                <input type="text" value="<?= $tccdata['devLevyYear2'] ?? '' ?>" class="form-control" id="devLevyYear2" name="devLevyYear2"
                       placeholder="Development Levy Receipt Number" required
                       onblur="checkReceipt(this, '#devYear2Name','#devYear2Amount','#devYear2Purpose','#devYear2Date','#devYear2error','.devyear2')" readonly>
                <small id="devYear2error" class="form-text text-muted"></small>
                <div class="devyear2 d-none">
                    <p>Name: <small id="devYear2Name" class="form-text text-muted"></small></p>
                    <p>Amount: <input type="text" id="devYear2Amount" name="devYear2Amount" class="form-text text-muted input-no-border" readonly></p>
                    <p>Revenue Type: <small id="devYear2Purpose" class="form-text text-muted"></small></p>
                    <p>Payment Date: <small id="devYear2Date" class="form-text text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($tccdata['application_year'] - 2) ?>" readonly>
            </div>
        </div>
    </div>

    <!-- Year 3 -->
    <div class="form-group mb-5">
        <!-- <label for="year3">Year <?= intval($tccdata['application_year']) - 1 ?? '' ?></label> -->
        <div class="row">
            <div class="col-md-4">
                <label for="directAssessment" class="form-label">Direct Assessment</label>
                <input type="text" value="<?= $tccdata['dirTaxYear3'] ?? '' ?>" class="form-control" id="dirTaxYear3" name="dirTaxYear3"
                       placeholder="Direct Tax Receipt Number" required
                       onblur="checkReceipt(this, '#dirYear3Name','#dirYear3Amount','#dirYear3Purpose','#dirYear3Date','#dirYear3error','.diryear3')" readonly>
                <small id="dirYear3error" class="form-text text-muted"></small>
                <div class="diryear3 d-none">
                    <p>Name: <small id="dirYear3Name" class="form-text text-muted"></small></p>
                    <p>Amount: <input type="text" id="dirYear3Amount" name="dirYear3Amount" class="form-text text-muted input-no-border" readonly></p>
                    <p>Revenue Type: <small id="dirYear3Purpose" class="form-text text-muted"></small></p>
                    <p>Payment Date: <small id="dirYear3Date" class="form-text text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-4">
                <label for="developmentLevy" class="form-label">Development Levy</label>
                <input type="text" value="<?= $tccdata['devLevyYear3'] ?? '' ?>" class="form-control" id="devLevyYear3" name="devLevyYear3"
                       placeholder="Development Levy Receipt Number" required
                       onblur="checkReceipt(this, '#devYear3Name','#devYear3Amount','#devYear3Purpose','#devYear3Date','#devYear3error','.devyear3')" readonly>
                <small id="devYear3error" class="form-text text-muted"></small>
                <div class="devyear3 d-none">
                    <p>Name: <small id="devYear3Name" class="form-text text-muted"></small></p>
                    <p>Amount: <input type="text" id="devYear3Amount" name="devYear3Amount" class="form-text text-muted input-no-border" readonly></p>
                    <p>Revenue Type: <small id="devYear3Purpose" class="form-text text-muted"></small></p>
                    <p>Payment Date: <small id="devYear3Date" class="form-text text-muted"></small></p>
                </div>
            </div>
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($tccdata['application_year'] - 1) ?>" readonly>
            </div>
        </div>
    </div>
</form>



</div>