<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>addNewJob</title>
        <link rel="stylesheet" href="./assests/css/addJob.styles.css">
    </head>
    <body>
        <hr>
        <div class="addjob-container">
            <div class="img">
                <img src="https://hrcdn.net/fcore/assets/svgs/skills_test_failed-6f44b0392a.svg"/>
            </div>
            <div class="form">
                <form action="#">
                    <div class="page">
                        <span class="type-1">Give your project brief a title</span>
                        <span class="type-2">Keep it short and simple - this will help us match you to the right category.</span>
                        <input type="text" placeholder="Example: Create a WordPress website for my company"/>

                        <span class="type-1">What are you looking to get done?</span>
                        <span class="type-2">This will help get your brief to the right talent. Specifics help here.</span><br>
                        <textarea placeholder="I need.." rows="8" ></textarea>

                        <span class="type-1">Attachements</span>
                        <input type="file" name="fileToUpload" class="fileToUpload">

                        <span class="type-1">Which category best fits your project?</span>
                        <select name="category" class="categories">
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
                    
                    <div class="page">

                    </div>
                </form>
            </div>
    </body>
</html>