const container = document.querySelector(".pre_container");


const span = document.querySelector("#text")
const image = document.querySelector("#img");

const inpFile = document.getElementById("fileInput");
console.log(inpFile)
inpFile.addEventListener('change', function() {
    const selected = this.files[0];

    if (selected) {
        span.style.display = 'none';
        image.style.display = 'block'

        const fileReader = new FileReader();

        fileReader.addEventListener('load', function() {
            console.log(this.result)
            image.setAttribute('src', this.result)
        })

        fileReader.readAsDataURL(selected)
    } else {

    }
})