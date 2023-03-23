document.addEventListener("DOMContentLoaded", () => {
    let upload = document.getElementById("upload-button");
    upload.addEventListener("click", (e) => {
        e.preventDefault();
        let img = document.getElementById("fileupload").files;
        let data = [];
        let element = "";
        for (const file of img) {
            data.push(file);
        }
        for (let i = 0; i < data.length; i++) {
            let formData = new FormData();
            formData.append("fichier", data[i]);
            fetch('upload.php', {
                method: "POST",
                body: formData
            }).then(response => response.text()).then(response => {
                element += response;
                if((response === "good") && (element === response.repeat(data.length)))
                {
                    console.log(response)
                }
            })
        }
        // alert('The file has been uploaded successfully.');
    })
})