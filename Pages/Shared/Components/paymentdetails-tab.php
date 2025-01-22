<div class="tab-pane fade show bg-white py-4" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
    <div class="d-flex justify-content-between">
        <!-- <h5>Personal Details</h5> -->
    </div>
    <div class="line"></div>
    <form class="py-4 app-container" id="paymentDetailsForm">
        <!-- Year 1 -->
        <div class="form-group mb-5">
            <div class="" for="year1">Year <?= date('Y', strtotime('-3 year')) ?> <em>*</em></div>
            <div class="row">
                <div class="col-md-6">
                    <label for="dirTaxYear1">Direct Assessment</label>
                    <input type="text" class="form-control" id="dirTaxYear1" name="dirTaxYear1"
                        required
                        onblur="checkReceipt(this, '#dirYear1Name','#dirYear1Amount','#dirYear1Purpose','#dirYear1Date','#dirYear1error','.diryear1')">
                    <small id="dirYear1error" class="form-text text-muted"></small>
                    <div class="diryear1 d-none">
                        <p>Name: <small id="dirYear1Name" class="form-text text-muted"></small></p>
                        <p>Amount: <input type="text" id="dirYear1Amount" name="dirYear1Amount" class="form-text text-muted input-no-border" readonly></input></p>
                        <p>Revenue Type: <small id="dirYear1Purpose" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="dirYear1Date" class="form-text text-muted"></small></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="devLevyYear1">Development Levy</label>
                    <input type="text" class="form-control" id="devLevyYear1" name="devLevyYear1"
                        required
                        onblur="checkReceipt(this, '#devYear1Name','#devYear1Amount','#devYear1Purpose','#devYear1Date','#devYear1error','.devyear1')">
                    <small id="devYear1error" class="form-text text-muted"></small>
                    <div class="devyear1 d-none">
                        <p>Name: <small id="devYear1Name" class="form-text text-muted"></small></p>
                        <p>Amount: <input type="text" name="devYear1Amount" id="devYear1Amount" class="form-text text-muted input-no-border" readonly></input></p>
                        <p>Revenue Type: <small id="devYear1Purpose" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="devYear1Date" class="form-text text-muted"></small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Year 2 -->
        <div class="form-group mb-5">
            <div class="" for="year2">Year <?= date('Y', strtotime('-2 year')) ?> <em>*</em></div>
            <div class="row">
                <div class="col-md-6">
                    <label for="dirTaxYear2">Direct Assessment</label>
                    <input type="text" class="form-control" id="dirTaxYear2" name="dirTaxYear2"
                        required
                        onblur="checkReceipt(this, '#dirYear2Name','#dirYear2Amount','#dirYear2Purpose',' #dirYear2Date','#dirYear2error','.diryear2')">
                    <small id="dirYear2error" class="form-text text-muted"></small>
                    <div class="diryear2 d-none">
                        <p>Name: <small id="dirYear2Name" class="form-text text-muted"></small></p>
                        <p>Amount: <input type="text" name="dirYear2Amount" id="dirYear2Amount" class="form-text text-muted input-no-border" readonly></input></p>
                        <p>Revenue Type: <small id="dirYear2Purpose" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="dirYear2Date" class="form-text text-muted"></small></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="devLevyYear2">Development Levy</label>
                    <input type="text" class="form-control" id="devLevyYear2" name="devLevyYear2"
                        required
                        onblur="checkReceipt(this, '#devYear2Name','#devYear2Amount','#devYear2Purpose','#devYear2Date','#devYear2error','.devyear2')">
                    <small id="devYear2error" class="form-text text-muted"></small>
                    <div class="devyear2 d-none">
                        <p>Name: <small id="devYear2Name" class="form-text text-muted"></small></p>
                        <p>Amount: <input type="text" name="devYear2Amount" id="devYear2Amount" class="form-text text-muted input-no-border" readonly></input></p>
                        <p>Revenue Type: <small id="devYear2Purpose" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="devYear2Date" class="form-text text-muted"></small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Year 3 -->
        <div class="form-group mb-5">
            <div class="" for="year3">Year <?= date('Y', strtotime('-1 year')) ?> <em>*</em></div>
            <div class="row">
                <div class="col-md-6">
                    <label for="dirTaxYear3">Direct Assessment</label>
                    <input type="text" class="form-control" id="dirTaxYear3" name="dirTaxYear3"
                        required
                        onblur="checkReceipt(this, '#dirYear3Name','#dirYear3Amount','#dirYear3Purpose','#dirYear3Date','#dirYear3error','.diryear3')">
                    <small id="dirYear3error" class="form-text text-muted"></small>
                    <div class="diryear3 d-none">
                        <p>Name: <small id="dirYear3Name" class="form-text text-muted"></small></p>
                        <p>Amount: <input type="text" name="dirYear3Amount" id="dirYear3Amount" class="form-text text-muted input-no-border" readonly></input></p>
                        <p>Revenue Type: <small id="dirYear3Purpose" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="dirYear3Date" class="form-text text-muted"></small></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="devLevyYear3">Development Levy </label>
                    <input type="text" class="form-control" id="devLevyYear3" name="devLevyYear3"
                        required
                        onblur="checkReceipt(this, '#devYear3Name','#devYear3Amount','#devYear3Purpose','#devYear3Date','#devYear3error','.devyear3')">
                    <small id="devYear3error" class="form-text text-muted"></small>
                    <div class="devyear3 d-none">
                        <p>Name: <small id="devYear3Name" class="form-text text-muted"></small></p>
                        <p>Amount: <input type="text" name="devYear3Amount" id="devYear3Amount" class="form-text text-muted input-no-border" readonly></input></p>
                        <p>Revenue Type: <small id="devYear3Purpose" class="form-text text-muted"></small></p>
                        <p>Payment Date: <small id="devYear3Date" class="form-text text-muted"></small></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success px-5 mt-3 p-2" onclick="validateTccForm('paymentDetailsForm')">Next</button>
        </div>
    </form>

    <div class="alert alert-success align-items-center success-container d-none">
        <P>YOUR APPLICATION IS SUCCESSFUL AND YOUR APPLICATION NUMBER IS: <span id="appnumber"></span></P>
        <P>Please keep your application number safe for this is what you will use to track your application progress.</P>
    </div>


</div>