let input = document.getElementByClass("fileToUpload");
let fileName = document.getElementById("fileName")

input.addEventListener("change", ()=>{
    let inputFile = document.querySelector("input[type=file]").files[0];

    fileName.innerText = inputFile.name;
})
