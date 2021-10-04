<div class="modal fade" id="viewVehicle" tabindex="-1" aria-labelledby="viewVehicleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewVehicleLabel">Update A Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/classes" method="post" class="text-start">
                    @csrf
                    <div class="form-group">
                        <label for="className" class="me-4"> Class Name</label>
                        <input type="text" name="className" id="className">
                    </div>

                    <div class="form-group">
                        <label for="classGrade" class="me-4"> Class Grade </label>
                        <select name="classGrade" id="classGrade">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="classMajor" class="me-4"> Class Major </label>
                        <select name="classMajor" id="classMajor">
                            <option value="Software">Software</option>
                            <option value="Technical">Technical</option>
                            <option value="Accounting">Accounting</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary"> Create </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="payInstalment" tabindex="-1" aria-labelledby="payInstalmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payInstalmentLabel">Pay An Instalment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/transactions/payInstalment" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="instalmentCode">Instalment Code</label>
                        <input type="text" class="form-control mb-3" name="instalment_code" id="instalmentCode" placeholder="Instalment's code">
                    </div>

                    <div class="form-group">
                        <label for="creditCode">Credit Code</label>
                        <input type="text" class="form-control mb-3" name="credit_code" id="creditCode" placeholder="Credit's code">
                    </div>

                    <div class="form-group">
                        <label for="instalmentDate">Instalment Date</label>
                        <input type="date" class="form-control mb-3" name="instalment_date" id="instalmentDate" placeholder="Instalment's date">
                    </div>

                    <div class="form-group">
                        <label for="instalmentQuantity">Instalment Quantity</label>
                        <input type="number" class="form-control mb-3" name="instalment_quantity" id="instalmentQuantity" placeholder="Instalment's quantity">
                    </div>

                    <div class="form-group">
                        <label for="instalmentOf">Instalment Of The </label>
                        <input type="number" class="form-control mb-3" name="instalment_of" id="instalmentOf" placeholder="At what counter instalment does the client have?">
                    </div>

                    <div class="form-group">
                        <label for="instalmentRemaining">Instalment Remaining</label>
                        <input type="number" class="form-control mb-3" name="instalment_remaining" id="instalmentRemaining" placeholder="Instalment's remaining">
                    </div>

                    <div class="form-group">
                        <label for="instalmentRemainingPrice">Instalment Remaining Price</label>
                        <input type="number" class="form-control mb-3" name="instalment_remaining_price" id="instalmentRemainingPrice" placeholder="Instalment's remaining before it is complete">
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>