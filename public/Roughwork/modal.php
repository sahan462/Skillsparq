    <!--Modal 1  -->
    <div class="overlay" id="overlay">
        <div class="modal" id="packageModal">
            <form id="packageRequestForm">
                <div class="row">
                    <label for="requestDescription" class="type-1">Request Description:</label>
                    <label for="requestDescription" class="type-2">Please provide a concise overview of the task you would like to accomplish.</label>
                    <textarea id="requestDescription" name="requestDescription" rows="10" required></textarea>
                </div>

                <div class="row">
                    <label for="attachments" class="type-1">Attachments:</label>
                    <label for="attachments" class="type-2">Kindly upload any attachments as a compressed ZIP file, if applicable.</label>
                    <div class="innerRow" style="display: flex; flex-direction: row; align-items: center;">
                        <label for="attachments" id="attachment" style="margin-right: 4px;">Attachements</label>
                        <div id="warningMessage" style="color: red; display: none;">Invalid file type. Only ZIP files are allowed.</div>
                        <span id="fileName"></span>
                    </div>
                    <input type="file" class="fileInput" id="attachments" name="attachments" multiple onchange="displayFileName(this)">
                </div>

                <div class="buttons">
                    <button type="button" onclick="confirmAction('cancel')">Cancel Request</button>
                    <button type="button" onclick="confirmAction('send')">Send Request</button>
                </div>

                <input type="hidden" name="gigId" value="<?php echo $gig['gig_id']?>">
                <input type="hidden" name="sellerId" value="<?php echo $gig['seller_id']?>">
                <input type="hidden" name="orderType" value="package">
                <input type="hidden" name="buyerId" value="<?php echo $_SESSION['userId']?>">
            </form>
        </div>
    </div>

        <!-- Modal 4 -->
        <div class="overlay" id="Overlay">
        <div class="modal" id="milestoneModal">
            
            <!-- button to add new milestone -->
            <!-- <button type="button" class="createNewMileStone" onclick="addCollapsible()">Create New MileStone</button> -->
            
            <form method="get" id="milestoneRequestForm"> 

                <!-- New milestone appends here -->
                <!-- <div id="inputContainer" >
                    <div id="animation"></div>
                </div> -->

                <!-- Template for a milestone-->
                <!-- <template id="collapsibleTemplate">
                    <button type="button" class="collapsible" id="collapsible" onclick="expand(this)"></button>

                    <div class="collapsibleContent">

                        <div class="row">
                            <div class="col">
                                <div class="type-1">Subject</div>
                                <input type="text" name="milestone[subject][]">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="type-1">Revisions</div>
                                <select name="milestone[revisions][]" required="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="Unlimited">Unlimited</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="type-1">Delivery</div>
                                <div class="row">
                                    <input type="number" name="milestone[quantity][]" min="1">
                                    <select name="milestone[timePeriod][]" class="categories">
                                        <option value="Days">Day(s)</option>
                                        <option value="Weeks">Week(s)</option>
                                        <option value="Months">Month(s)</option>
                                        <option value="Years">Year(s)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="type-1">Price</div>
                                <input type="text" name="milestone[price][]">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="type-1">Milestone Description</div>
                                <textarea name="milestone[description][]" placeholder="I need.." rows="6" spellcheck="false" oninput="this.className = ''" required=""></textarea>
                            </div>
                        </div>

                        <button type="button" class="removeButton" onclick="removeCollapsible(this)">Remove Milestone</button>

                    </div>

                </template> -->


                <div class="buttons">
                    <button type="button" onclick="confirmAction('cancel')">Cancel Request</button>
                    <button type="button" onclick="confirmAction('send')">Send Request</button>
                </div>

            </form>
        </div>
    </div>
