<?php include "components/buyerSimpleHeader.component.php"; ?>


<div class="addjob-container">
    <div class="img">
        <div class="header">Let the matching begin...</div>
        <img src="https://hrcdn.net/fcore/assets/svgs/skills_test_failed-6f44b0392a.svg"/>
    </div>
    <div class="form">
        <form method="get" action="<?php echo BASEURL.'Job/publishJob';?>" >
            <div class="page">

                <span class="type-1">Give your project brief a title</span>
                <span class="type-2">Keep it short and simple - this will help us match you to the right category.</span>
                <input type="text" name="title" placeholder="Example: Create a WordPress website for my company" required/>

                <span class="type-1">What are you looking to get done?</span>
                <span class="type-2">This will help get your brief to the right talent. Specifics help here.</span>
                <textarea name="description" placeholder="I need.." rows="8" required></textarea>

                <div class="custom-file-upload">
                    <input type="file" name="fileToUpload" class="fileToUpload" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                    </svg>
                    <span class="type-1" id="fileName">Attachements</span>
                </div>
                
                <div class="container">

                    <div class="expertise">
                        <span class="type-1">Which category best fits your project?</span>
                        <span class="type-2">Choose from list</span>
                        <select name="category" class="categories" required>
                            <option value="Graphics & Design">Graphics & Design</option>
                            <option value="Programming & Tech">Programming & Tech</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Video & Animation">Video & Animation</option>
                            <option value="Writing & Translation">Writing & Translation</option>
                            <option value="Music & Audio">Music & Audio</option>
                            <option value="Business">Business</option>
                            <option value="Data">Data</option>
                            <option value="Photography">Photography</option>
                            <option value="AI Services">AI Services</option>
                        </select>
                    </div>
                    <div class="deadline">
                        <span class="type-1" >Let’s talk timing</span>
                        <span class="type-2">Ideal delivery date</span>
                        <input type="date"  name="deadline_1" required>
                    </div>
                    <div class="mode">
                        <span class="type-1" >Preferable Publish Mode</span>
                        <span class="type-2">Standard Mode / Auction Mode</span>
                        <select name="publishMode" id="publish" class="categories" required>
                            <option value="Standard Mode">Standard Mode</option>
                            <option value="Auction Mode">Auction Mode</option>
                        </select>
                    </div>
                </div>

                <div class="auction custom-auction" id="auction">
                    <div class="duration" id="duration">
                        <span class="type-1">Start Date & Time</span>
                        <input type="datetime-local"  name="deadline_2" >
                        <span class="type-1">End Date & Time</span>
                        <input type="datetime-local"  name="deadline_3" >
                    </div>
                    <div class="price" id="price">
                        <div class="base-bid">
                            <span class="type-1">Starting Bid</span>
                            <input type="text" value="$" name="amount_1" placeholder="Up to" style="margin-bottom:0" />
                        </div>
                        <div class="min-bid">
                            <span class="type-1">Min. Bid Gap</span>
                            <input type="text" value="$" name="amount_2" placeholder="Up to" style="margin-bottom:0" />
                        </div>
                    </div>
                </div>
                <div id="fixed-price">
                    <span class="type-1">I'm looking to spend...</span>
                    <input type="text" value="$" name="amount_3" placeholder="Up to" style="margin-bottom:0" oninput="updateBudget()"/>
                    <input type="checkbox" name="flexible-amount" >
                    <span for="flexible-amount" >My budget is flexible</span>
                </div>

            </div>

            <button type="submit" class="buttonType-1 next" name="submit"><span>Publish</span></button>

        </form>
    </div>
</div>

<script src="/skillsparq/public/assests/js/addJob.script.js"></script>

<?php include "components/footer.component.php"?>
